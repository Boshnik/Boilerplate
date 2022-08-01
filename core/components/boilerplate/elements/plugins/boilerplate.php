<?php

/**
 * Boilerplate
 *
 * @var modX $modx
 * @var array $scriptProperties
 */

/** @var Boilerplate $boilerplate */
if ($modx->services instanceof Psr\Http\Client\ClientInterface) {
    $boilerplate = $modx->services->get('boilerplate');
} else {
    $boilerplate = $modx->getService('boilerplate', 'Boilerplate', MODX_CORE_PATH . 'components/boilerplate/model/');
}

$className = 'Boshnik\Boilerplate\Events\\' . $modx->event->name;
if (class_exists($className)) {
    $handler = new $className($modx, $scriptProperties);
    $handler->run();
}