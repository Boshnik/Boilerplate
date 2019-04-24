<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var Boilerplate $Boilerplate */
$Boilerplate = $modx->getService('Boilerplate', 'Boilerplate', MODX_CORE_PATH . 'components/boilerplate/model/');
$modx->lexicon->load('boilerplate:default');

// handle request
$corePath = $modx->getOption('boilerplate_core_path', null, $modx->getOption('core_path') . 'components/boilerplate/');
$path = $modx->getOption('processorsPath', $Boilerplate->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);