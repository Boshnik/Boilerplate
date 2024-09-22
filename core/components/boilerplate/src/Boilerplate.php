<?php

namespace Boshnik\Boilerplate;

use modX;

/**
 * class Boilerplate
 */
class Boilerplate
{
    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(public modX $modx, public array $config = [])
    {
        $corePath = MODX_CORE_PATH . 'components/boilerplate/';
        $assetsUrl = MODX_ASSETS_URL . 'components/boilerplate/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('boilerplate', $this->config['modelPath']);
        $this->modx->lexicon->load('boilerplate:default');
    }

}