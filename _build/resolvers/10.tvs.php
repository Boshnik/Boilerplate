<?php
$tvs = array();
$tvsValue = array(
    'googlemap' => array(
        'type' => 'mapstv',
        'caption' => 'Google map',
    ),
);

if ($object->xpdo) {
    /* @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            
            // Создаем категорию Карта
            $categoryId = 0;
            if(!$category = $modx->getObject('modCategory', array('category' => 'Карта'))) {
                if($category = $modx->newObject('modCategory', array('category' => 'Карта'))) {
                    $category->save();
                }
            }
            $categoryId = $category->get('id');
            
            foreach($tvsValue as $name => $value) {
                if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
                    $tv = $modx->newObject('modTemplateVar');
                    
                    // Удаляем пробелы
                    foreach($value as $key => $arr) {
                        if(is_array($arr)) {
                            $value[$key] = array_map('trim', $arr);
                        }
                    }
          
                    $tv->fromArray(array_merge(array('name' => $name), $value));
                    $tv->set('category', $categoryId);
                    $tv->save();
                } else {
                    // Обновляем TV
                    if( $config['update']['tv'] ) {
                        $tv->set('category', $categoryId);
                        foreach($value as $n => $val) {
                            $tv->set($n, $val);
                        }
                        $tv->save();
                    }
                    
                }
                if($name != 'img') {
                    $tvs[] = $tv->get('id');   
                }
            }
    
            // Применям тв для шаблона BaseTempalte
            $tempalteID = 1;
            if($template = $modx->getObject('modTemplate', array('id' => $tempalteID))) {
                foreach ($tvs as $k => $tvid) {
                    $record = array('tmplvarid' => $tvid, 'templateid' => $tempalteID);
                    if (!$tvt = $modx->getObject('modTemplateVarTemplate', $record)) {
                        $tvt = $modx->newObject('modTemplateVarTemplate');
                        $tvt->set('tmplvarid', $tvid);
                        $tvt->set('templateid', $tempalteID);
                        $tvt->save();
                    }
                }
            }
            
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            foreach($tvsValue as $name => $value) {
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