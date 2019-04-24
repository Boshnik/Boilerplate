<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var Boilerplate $Boilerplate */
switch ($modx->event->name) {
    case 'OnMODXInit':
        if ($Boilerplate = $modx->getService('Boilerplate', 'Boilerplate', MODX_CORE_PATH . 'components/boilerplate/model/')) {
            $Boilerplate->initialize();
        }
        break;
    default:
        if ($Boilerplate = $modx->getService('Boilerplate')) {
            $Boilerplate->handleEvent($modx->event, $scriptProperties);
        }
}