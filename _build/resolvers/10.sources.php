<?php

/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $tmp = explode('/', MODX_ASSETS_URL);
            $assets = $tmp[count($tmp) - 2];

            $properties = array(
                'name' => 'Images',
                'description' => 'Default media source for images',
                'class_key' => 'sources.modFileMediaSource',
                'properties' => array(
                    'basePath' => array(
                        'name' => 'basePath',
                        'desc' => 'prop_file.basePath_desc',
                        'type' => 'textfield',
                        'lexicon' => 'core:source',
                        'value' => $assets . '/images/',
                    ),
                    'baseUrl' => array(
                        'name' => 'baseUrl',
                        'desc' => 'prop_file.baseUrl_desc',
                        'type' => 'textfield',
                        'lexicon' => 'core:source',
                        'value' => 'assets/images/',
                    ),
                ),
                'is_stream' => 1,
            );
            /** @var $source modMediaSource */
            if (!$source = $modx->getObject('sources.modMediaSource', array('name' => $properties['name']))) {
                $source = $modx->newObject('sources.modMediaSource', $properties);
            } else {
                $default = $source->get('properties');
                foreach ($properties['properties'] as $k => $v) {
                    if (!array_key_exists($k, $default)) {
                        $default[$k] = $v;
                    }
                }
                $source->set('properties', $default);
            }
            $source->save();

            if ($setting = $modx->getObject('modSystemSetting', array('key' => 'default_media_source'))) {
                $setting->set('value', $source->get('id'));
                $setting->save();
            }
            @mkdir(MODX_ASSETS_PATH . 'images/');
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;