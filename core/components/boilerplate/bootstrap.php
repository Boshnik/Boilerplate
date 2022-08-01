<?php
/** @var MODX\Revolution\modX $modx */

require_once MODX_CORE_PATH . 'components/boilerplate/vendor/autoload.php';

$modx->services['boilerplate'] = $modx->services->factory(function($c) use ($modx) {
    return new Boshnik\Boilerplate\Boilerplate($modx);
});