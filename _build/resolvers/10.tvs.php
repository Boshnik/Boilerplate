<?php
$tvs = array(
    'googlemap' => array(
        'type' => 'mapstv',
        'caption' => 'Google map',
        'category' => 'Карта',
    ),
    // 'constructor' => array(
    //     'type' => 'migx',
    //     'caption' => 'Blocks constructor',
    //     'category' => 'MIGX',
    //     'input_properties' => array(
    //         'configs' => 'Constructor',
    //         'formtabs' => '',
    //         'columns' => '',
    //         'btntext' => '',
    //         'previewurl' => '',
    //         'jsonvarkey' => '',
    //         'autoResourceFolders' => false,
    //     ),
    // ),
    // 'slider' => array(
    //     'type' => 'migx',
    //     'caption' => 'Slider',
    //     'category' => 'MIGX',
    //     'input_properties' => array('configs' => 'migx.slider'),    
    // ),
);

$tvsTemplate = array(
    'googlemap' => 1,    
    // 'constructor' => 1,    
);

if ($object->xpdo) {
    /* @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:

            // Получаем id категорий
            foreach($tvs as $name => $value) {
                if(!$category = $modx->getObject('modCategory', array('category' => $value['category']))) {
                    if($category = $modx->newObject('modCategory', array('category' => $value['category']))) {
                        $category->save();
                    }
                }
                $tvs[$name]['category'] = $category->get('id') ?: 0;
            }
            
            foreach($tvs as $name => $value) {
                if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
                    $tv = $modx->newObject('modTemplateVar');
                    $tv->fromArray(array_merge(array('name' => $name),$value));
                    $tv->save();
                }
                
                $tvs[$name]['id'] = $tv->get('id');
            }
    
            // Применям шаблоны для tv
            foreach ($tvsTemplate as $name => $value) {
                if($template = $modx->getObject('modTemplate', array('id' => $value))) {
                    $record = array('tmplvarid' => $tvs[$name]['id'], 'templateid' => $value);
                    if (!$tvt = $modx->getObject('modTemplateVarTemplate', $record)) {
                        $tvt = $modx->newObject('modTemplateVarTemplate');
                        foreach($record as $n => $v) {
                            $tvt->set($n, $v);    
                        }
                        $tvt->save();
                    }    
                }
            }
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            foreach($tvs as $name => $value) {
                if ($tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
                    if ($tv->remove() == false) {
                       echo "An error occurred while trying to remove the tv $name!";
                    }
                }
            }
            break;
    }
}
return true;