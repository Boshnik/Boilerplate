<?php

class Boilerplate
{
    /** @var modX $modx */
    public $modx;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/boilerplate/';
        $assetsUrl = MODX_ASSETS_URL . 'components/boilerplate/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'modifiersPath' => $corePath . 'modifiers/',
            'processorsPath' => $corePath . 'processors/',

            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('boilerplate', $this->config['modelPath']);
        $this->modx->lexicon->load('boilerplate:default');
    }
    
    /**
     * Initialize Boilerplate
     */
    public function initialize()
    {
        $this->pdoTools = $this->modx->getService('pdoFetch');
        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(openssl_random_pseudo_bytes(16));
        }

    }
    
    /**
     * @param $action
     * @param array $data
     *
     * @return array|bool|mixed
     */
    public function runProcessor($action, array $data = [])
    {
        $action = 'web/' . trim($action, '/');
        /** @var modProcessorResponse $response */
        $response = $this->modx->runProcessor($action, $data, ['processors_path' => $this->config['processorsPath']]);
        if ($response) {
            $data = $response->getResponse();
            if (is_string($data)) {
                $data = json_decode($data, true);
            }

            return $data;
        }

        return false;
    }
    
    /**
     * @param modSystemEvent $event
     * @param array $scriptProperties
     */
    public function handleEvent(modSystemEvent $event, array $scriptProperties)
    {
        extract($scriptProperties);
        switch ($event->name) {
            case 'pdoToolsOnFenomInit':
                /** @var Fenom|FenomX $fenom */
                $fenom->addAllowedFunctions([
                    'array_keys',
                    'array_values',
                ]);
                
                $fenom->addAccessorSmart('ru', 'ru', Fenom::ACCESSOR_PROPERTY);
                $fenom->ru = $this->modx->getOption('cultureKey') == 'ru';
                
                $fenom->addAccessorSmart('en', 'en', Fenom::ACCESSOR_PROPERTY);
                $fenom->en = $this->modx->getOption('cultureKey') == 'en';
                
                // modifiers fenom
                $modifiers = array_diff(scandir($this->config['modifiersPath']), array('..', '.'));
                if(is_array($modifiers)) {
                    foreach($modifiers as $modifier) {
                        include($this->config['modifiersPath'] . $modifier);
                    }
                }
                break;

            case 'OnHandleRequest':
                if ($this->modx->context->key == 'mgr') {
                    return;
                }

                break;
                
            case 'OnWebPageInit':
                if ($this->modx->context->key != 'mgr') {
                    
                    // Counters
                    $query = $this->modx->newQuery('BoilerplateCounter');
                    $query->select($this->modx->getSelectColumns('BoilerplateCounter', 'BoilerplateCounter', '', '', false));
                    $query->prepare();
                    $query->stmt->execute();
                    $counters = $query->stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($counters as $counter) {
                        if($counter['active'] && $this->modx->context->key == $counter['context']) {
                            $code = $counter['content'];
                            if($counter['position'] == 'Head') {
                                $this->modx->regClientStartupHTMLBlock($code);
                            } else {
                                $this->modx->regClientHTMLBlock($code);
                            }
                        }
                    }
                    
                }

                break;    
            case 'OnWebPagePrerender':
                
                // Compress output html for Google
                if($this->modx->getOption('boilerplate_compress_output_html') && $this->modx->resource->get('alias') != 'robots') {
                    $this->modx->resource->_output = preg_replace('#\s+#', ' ', $this->modx->resource->_output);
                }
                
                break;
            case 'OnManagerPageInit':
                $managerCss = 'components/boilerplate/mgr/manager.css';
                if(file_exists(MODX_ASSETS_PATH . $managerCss)) {
                    $this->modx->regClientCSS('/assets/'.$managerCss);
                }
                
                // Hide vertical tab for tv
                $hideVTabsCss = 'components/boilerplate/mgr/hidevtabs.css';
                if($this->modx->getOption('boilerplate_hide_vtabs_tv') && file_exists(MODX_ASSETS_PATH . $hideVTabsCss)) {
                    $this->modx->regClientCSS('/assets/'.$hideVTabsCss);
                }
                
                break;
                
                
        }
    }

}