<?php

namespace Boshnik\Boilerplate\Events;

/**
 * class OnMODXInit
 */
class OnMODXInit extends Event
{
    public function run()
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(16));
        }

        if ($this->modx->context->key != 'mgr' && $this->modx->getOption('friendly_urls')) {
            $this->changeContext();
        }

        // https://content-security-policy.com/nonce/
        if ($this->modx->context->key != 'mgr') {
            $header = $this->modx->getObject('modSystemSetting', ['key' => 'boilerplate_csp']);
            if (empty($header->get('value'))) {
                unset($_SESSION['csp_nonce']);
            } else {
                $nonce = bin2hex(openssl_random_pseudo_bytes(6));
                $header = preg_replace('(nonce-.{12})', "nonce-$nonce", $header->get('value'));
                if ($this->modx->context->key)
                    header($header);
                $_SESSION['csp_nonce'] = $nonce;
            }
        }
    }

    public function changeContext()
    {
        $alias = $this->modx->getOption('request_param_alias', null, 'alias', true);
        $request = &$_REQUEST[$alias];

        $q = $this->modx->newQuery('modContextSetting', array('key' => 'base_url', 'value:!=' => ''));
        $q->select('context_key,value');

        $tstart = microtime(true);
        if ($q->prepare() && $q->stmt->execute()) {
            $this->modx->queryTime += microtime(true) - $tstart;
            $this->modx->executedQueries++;
            while ($row = $q->stmt->fetch(\PDO::FETCH_ASSOC)) {
                $base_url = trim($row['value'], '/');
                $context = $row['context_key'];
                if (preg_match('/^(' . $base_url . ')\//i', $request)) {
                    if ($context != 'web') {
                        $this->modx->switchContext($context);
                    }
                    $request = preg_replace('/^' . $base_url . '\//', '', $request);
                    break;
                }
            }
        }
    }
}