<?php

if ($object->xpdo) {
    /** @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:

            if ($modx->getVersionData()['version'] == 3) {
                $resources = $modx->getIterator(modResource::class, ['class_key' => 'modDocument']);
                foreach ($resources as $resource) {
                    $resource->set('class_key', 'MODX\Revolution\modDocument');
                    $resource->save();
                }
            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;