<?php
$migx = array(
    'Constructor' => array(
        'actionbuttons' => 'exportimportmigx',
        'columnbuttons' => 'edit_migx',
        'columns' => '[{"MIGX_id":1,"header":"Name block","dataIndex":"MIGX_formname","width":150,"sortable":"false","show_in_grid":1,"customrenderer":"","renderer":"","clickaction":"","selectorconfig":"","renderchunktpl":"","renderoptions":"","editor":""},{"MIGX_id":2,"header":"Chunk","dataIndex":"chunk","width":150,"sortable":"false","show_in_grid":1,"customrenderer":"","renderer":"this.renderChunk","clickaction":"","selectorconfig":"","renderchunktpl":"[[+chunk:isempty=`[[+MIGX_formname:lcase:replace=` ==-`]]`]]","renderoptions":"","editor":""},{"MIGX_id":3,"header":"Active","dataIndex":"active","width":150,"sortable":"false","show_in_grid":1,"customrenderer":"","renderer":"this.renderCrossTick","clickaction":"","selectorconfig":"","renderchunktpl":"","renderoptions":"","editor":""},{"MIGX_id":4,"header":"Edit","dataIndex":"edit_migx","width":150,"sortable":"false","show_in_grid":1,"customrenderer":"","renderer":"this.renderRowActions","clickaction":"","selectorconfig":"","renderchunktpl":"","renderoptions":"","editor":""}]',
        'extended' => '{"migx_add":"Add block","disable_add_item":"","add_items_directly":"","formcaption":"","update_win_title":"","win_id":"","maxRecords":"","addNewItemAt":"bottom","media_source_id":"","multiple_formtabs":"","multiple_formtabs_label":"","multiple_formtabs_field":"","multiple_formtabs_optionstext":"","multiple_formtabs_optionsvalue":"","actionbuttonsperrow":"4","winbuttonslist":"","extrahandlers":"","filtersperrow":"4","packageName":"","classname":"","task":"","getlistsort":"","getlistsortdir":"","sortconfig":"","gridpagesize":"","use_custom_prefix":"0","prefix":"","grid":"","gridload_mode":"1","check_resid":"1","check_resid_TV":"","join_alias":"","has_jointable":"yes","getlistwhere":"","joins":"","hooksnippets":"","cmpmaincaption":"","cmptabcaption":"","cmptabdescription":"","cmptabcontroller":"","winbuttons":"","onsubmitsuccess":"","submitparams":""}',
    ),
    'Empty' => array(
        'formtabs' => '[{"MIGX_id":1,"caption":"","print_before_tabs":"0","fields":[{"MIGX_id":1,"field":"fake","caption":"","description":"","description_is_code":"0","inputTV":"","inputTVtype":"hidden","validation":"","configs":"","restrictive_condition":"","display":"","sourceFrom":"config","sources":"","inputOptionValues":"","default":"","useDefaultIfEmpty":"0","pos":1}],"pos":1}]',
        'extended' => '{"migx_add":"","disable_add_item":"","add_items_directly":"","formcaption":"","update_win_title":"","win_id":"","maxRecords":"","addNewItemAt":"bottom","media_source_id":"","multiple_formtabs":"","multiple_formtabs_label":"","multiple_formtabs_field":"","multiple_formtabs_optionstext":"Select block","multiple_formtabs_optionsvalue":"","actionbuttonsperrow":4,"winbuttonslist":"","extrahandlers":"","filtersperrow":4,"packageName":"","classname":"","task":"","getlistsort":"","getlistsortdir":"","sortconfig":"","gridpagesize":"","use_custom_prefix":"0","prefix":"","grid":"","gridload_mode":1,"check_resid":1,"check_resid_TV":"","join_alias":"","has_jointable":"yes","getlistwhere":"","joins":"","hooksnippets":"","cmpmaincaption":"","cmptabcaption":"","cmptabdescription":"","cmptabcontroller":"","winbuttons":"","onsubmitsuccess":"","submitparams":""}',
    ),
    'Slider' => array(
        'formtabs' => '[{"MIGX_id":1,"caption":"Slider","print_before_tabs":"0","fields":[{"MIGX_id":2,"field":"slider","caption":"Slider","description":"","description_is_code":"0","inputTV":"slider","inputTVtype":"","validation":"","configs":"","restrictive_condition":"","display":"","sourceFrom":"config","sources":"","inputOptionValues":"","default":"","useDefaultIfEmpty":"0","pos":1},{"MIGX_id":3,"field":"active","caption":"Active","description":"","description_is_code":"0","inputTV":"","inputTVtype":"checkbox","validation":"","configs":"","restrictive_condition":"","display":"","sourceFrom":"config","sources":"","inputOptionValues":"Yes==1","default":1,"useDefaultIfEmpty":"0","pos":2}],"pos":1}]',
        'extended' => '{"migx_add":"","disable_add_item":"","add_items_directly":"","formcaption":"","update_win_title":"","win_id":"","maxRecords":"","addNewItemAt":"bottom","media_source_id":"","multiple_formtabs":"","multiple_formtabs_label":"","multiple_formtabs_field":"","multiple_formtabs_optionstext":"","multiple_formtabs_optionsvalue":"","actionbuttonsperrow":4,"winbuttonslist":"","extrahandlers":"","filtersperrow":4,"packageName":"","classname":"","task":"","getlistsort":"","getlistsortdir":"","sortconfig":"","gridpagesize":"","use_custom_prefix":"0","prefix":"","grid":"","gridload_mode":1,"check_resid":1,"check_resid_TV":"","join_alias":"","has_jointable":"yes","getlistwhere":"","joins":"","hooksnippets":"","cmpmaincaption":"","cmptabcaption":"","cmptabdescription":"","cmptabcontroller":"","winbuttons":"","onsubmitsuccess":"","submitparams":""}',
    ),
    'migx.slider' => array(
        'formtabs' => '[{"MIGX_id":1,"caption":"Slider","print_before_tabs":"0","fields":[{"MIGX_id":114,"field":"img","caption":"Image","description":"","description_is_code":"0","inputTV":"","inputTVtype":"image","validation":"","configs":"","restrictive_condition":"","display":"","sourceFrom":"config","sources":"","inputOptionValues":"","default":"","useDefaultIfEmpty":"0","pos":1},{"MIGX_id":115,"field":"title","caption":"Title","description":"","description_is_code":"0","inputTV":"","inputTVtype":"","validation":"","configs":"","restrictive_condition":"","display":"","sourceFrom":"config","sources":"","inputOptionValues":"","default":"","useDefaultIfEmpty":"0","pos":2},{"MIGX_id":118,"field":"description","caption":"Description","description":"","description_is_code":"0","inputTV":"","inputTVtype":"richtext","validation":"","configs":"","restrictive_condition":"","display":"","sourceFrom":"config","sources":"","inputOptionValues":"","default":"","useDefaultIfEmpty":"0","pos":3}],"pos":1}]',
        'extended' => '{"migx_add":"Add slide","disable_add_item":"","add_items_directly":"","formcaption":"","update_win_title":"","win_id":"","maxRecords":"","addNewItemAt":"bottom","media_source_id":"","multiple_formtabs":"","multiple_formtabs_label":"","multiple_formtabs_field":"","multiple_formtabs_optionstext":"","multiple_formtabs_optionsvalue":"","actionbuttonsperrow":"4","winbuttonslist":"","extrahandlers":"","filtersperrow":"4","packageName":"","classname":"","task":"","getlistsort":"","getlistsortdir":"","sortconfig":"","gridpagesize":"","use_custom_prefix":"0","prefix":"","grid":"","gridload_mode":"1","check_resid":"1","check_resid_TV":"","join_alias":"","has_jointable":"yes","getlistwhere":"","joins":"","hooksnippets":"","cmpmaincaption":"","cmptabcaption":"","cmptabdescription":"","cmptabcontroller":"","winbuttons":"","onsubmitsuccess":"","submitparams":""}',
        'columns' => '[{"MIGX_id":1,"header":"Image","dataIndex":"img","width":200,"sortable":"false","show_in_grid":1,"customrenderer":"","renderer":"this.renderImage","clickaction":"","selectorconfig":"","renderchunktpl":"","renderoptions":"","editor":""},{"MIGX_id":2,"header":"Title","dataIndex":"title","width":400,"sortable":"false","show_in_grid":1,"customrenderer":"","renderer":"","clickaction":"","selectorconfig":"","renderchunktpl":"","renderoptions":"","editor":""}]',
    ),
);

if ($object->xpdo) {
    /* @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            
            if(empty($options['packages']) || !in_array('MIGX', $options['packages'])) {
                break;
            }
            $packageName = 'migx';
            $packagepath = MODX_CORE_PATH . 'components/' . $packageName . '/';
            $modelpath = $packagepath . 'model/';
            $prefix = null;
            $modx->addPackage($packageName, $modelpath, $prefix);
            
            foreach($migx as $name => $value) {
                if (!$mg = $modx->getObject('migxConfig', array('name' => $name))) {
                    $mg = $modx->newObject('migxConfig');
                    $mg->fromArray(array_merge(array(
                        'name' => $name,
                        'createdby' => 1,
                        'editedby' => 1,
                        'published' => 1,
                    ), $value));
                    $mg->save();
                }
            }
    
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            foreach($migx as $name => $value) {
                if ($mg = $modx->getObject('migxConfig', array('name' => $name))) {
                    if ($mg->remove() == false) {
                       echo "An error occurred while trying to remove the migx $name!";
                    }
                }
            }
            break;
    }
}
return true;