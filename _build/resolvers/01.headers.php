<?php

if ($object->xpdo) {
    /** @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            
            if ($object = $modx->getObject('modContentType', ['name'=>'HTML'])){
                $object->set('headers', [
                    'X-Frame-Options:deny',
                    'X-XSS-Protection:1;mode=block',
                    'X-Content-Type-Options:nosniff',
                    'Referrer-Policy:no-referrer',
                    'Cache-Control: max-age=31536000, must-revalidate',
                    "Content-Security-Policy: default-src 'self' *.googleapis.com *.gstatic.com *.googletagmanager.com *.jsdelivr.net;"
                ]);
                $object->save();
            }
            
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;