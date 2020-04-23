<?php
$menus = array(
    'Base of blocks' => array(
        'text' => 'Base of blocks',
        'parent' => 'topnav',
        'action' => 'resource/update',
        'description' => '',
        'icon' => '',
        'menuindex' => 4,
        'params' => '',
        'handler' => '',
        'permissions' => '',
        'namespace' => 'core' 
    ),
);

if ($object->xpdo) {
    /* @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            
            foreach($menus as $name => $value) {
                // get resource id for params parameter
                if($r = $modx->getObject('modResource', array('pagetitle' => $name))) {
                    $value['params'] = "&id={$r->get('id')}";
                    if (!$menu = $modx->getObject('modMenu', array('text' => $name))) {
                        $menu = $modx->newObject('modMenu');
                        $menu->set('text', $name);
                    }
                    $menu->fromArray($value);
                    $menu->save();
                }
            }

            break;
        case xPDOTransport::ACTION_UNINSTALL:
            foreach($menus as $name => $value) {
                if ($menu = $modx->getObject('modMenu', array('text' => $name))) {
                    if ($menu->remove() == false) {
                       echo "An error occurred while trying to remove the menu $name!";
                    }
                }
            }
            break;
    }
}
return true;