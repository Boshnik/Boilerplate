<?php

$exists = $templates = $chunks = $packages = false;
$output = null;
/** @var array $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        // $exists = $modx->getObject('transport.modTransportPackage', array('package_name' => 'pdoTools'));
    //     if (!empty($options['attributes']['packages'])) {
    //         $packages = '<ul id="formCheckboxesPackages" style="height:auto;overflow:auto;">';
    //         foreach ($options['attributes']['packages'] as $v => $p) {
    //             $packages .= '
				// <li class="package">
				// 	<label>
				// 		<input type="checkbox" name="update_packages[]" checked value="' . $v . '"> ' . $v . '
				// 	</label>
				// </li>';
    //         }
    //         $packages .= '</ul>';
    //     }
        if (!empty($options['attributes']['packages'])) {
            $packages = '<ul id="formCheckboxesPackages" style="height:auto;overflow:auto;">';
            foreach ($options['attributes']['packages'] as $v => $p) {
                $packages .= '
				<li class="package">
					<label>
						<input type="checkbox" name="update_packages[]" checked value="' . $p . '"> ' . $p . '
					</label>
				</li>';
            }
            $packages .= '</ul>';
        }
        break;
    
    case xPDOTransport::ACTION_UPGRADE:
        // $exists = $modx->getObject('transport.modTransportPackage', array('package_name' => 'pdoTools'));
        
        
        if (!empty($options['attributes']['templates'])) {
            $templates = '<ul id="formCheckboxesTemplate" style="height:auto;overflow:auto;">';
            foreach ($options['attributes']['templates'] as $v) {
                $templates .= '
				<li>
					<label>
						<input type="checkbox" name="update_templates[]" value="' . $v . '"> ' . $v . '
					</label>
				</li>';
            }
            $templates .= '</ul>';
        }
        if (!empty($options['attributes']['chunks'])) {
            $chunks = '<ul id="formCheckboxesChunks" style="height:auto;overflow:auto;">';
            foreach ($options['attributes']['chunks'] as $v) {
                $chunks .= '
				<li>
					<label>
						<input type="checkbox" name="update_chunks[]"  value="' . $v . '"> ' . $v . '
					</label>
				</li>';
            }
            $chunks .= '</ul>';
        }
        if (!empty($options['attributes']['packages'])) {
            $packages = '<ul id="formCheckboxesPackages" style="height:auto;overflow:auto;">';
            foreach ($options['attributes']['packages'] as $v => $p) {
                $packages .= '
				<li class="package">
					<label>
						<input type="checkbox" name="update_packages[]" checked value="' . $p . '"> ' . $p . '
					</label>
				</li>';
            }
            $packages .= '</ul>';
        }
        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}



$output = '<style>
    li.package {
        display:inline-block;
        vertical-align:top;
        width:49%;
    }
</style>';
if ($templates) {
    switch ($modx->getOption('manager_language')) {
        case 'ru':
            $output .= 'Выберите шаблоны, которые нужно <b>перезаписать</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxesTemplate\').select(\'input\').each(function(v) {v.dom.checked = true;});">отметить все</a> |
					<a href="#" onclick="Ext.get(\'formCheckboxesTemplate\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
				</small>
			';
            break;
        default:
            $output .= 'Select templates, which need to <b>overwrite</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxesTemplate\').select(\'input\').each(function(v) {v.dom.checked = true;});">select all</a> |
					<a href="#" onclick="Ext.get(\'formCheckboxesTemplate\').select(\'input\').each(function(v) {v.dom.checked = false;});">deselect all</a>
				</small>
			';
    }

    $output .= $templates;
}
if ($chunks) {
    if(!empty($templates)) {
        $output .= '<br/><br/>';    
    }
    switch ($modx->getOption('manager_language')) {
        case 'ru':
            $output .= 'Выберите чпнки, которые нужно <b>перезаписать</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxesChunks\').select(\'input\').each(function(v) {v.dom.checked = true;});">отметить все</a> |
					<a href="#" onclick="Ext.get(\'formCheckboxesChunks\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
				</small>
			';
            break;
        default:
            $output .= 'Select templates, which need to <b>overwrite</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxesChunks\').select(\'input\').each(function(v) {v.dom.checked = true;});">select all</a> |
					<a href="#" onclick="Ext.get(\'formCheckboxesChunks\').select(\'input\').each(function(v) {v.dom.checked = false;});">deselect all</a>
				</small>
			';
    }

    $output .= $chunks;
}
if ($packages) {
    if(!empty($chunks) || !empty($templates)) {
        $output .= '<br/><br/>';    
    }
    switch ($modx->getOption('manager_language')) {
        case 'ru':
            $output .= 'Выберите приложение, которые необходимо <b>установить</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxesPackages\').select(\'input\').each(function(v) {v.dom.checked = true;});">отметить все</a> |
					<a href="#" onclick="Ext.get(\'formCheckboxesPackages\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
				</small>
			';
            break;
        default:
            $output .= 'Select package, which need to <b>build</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxesPackages\').select(\'input\').each(function(v) {v.dom.checked = true;});">select all</a> |
					<a href="#" onclick="Ext.get(\'formCheckboxesPackages\').select(\'input\').each(function(v) {v.dom.checked = false;});">deselect all</a>
				</small>
			';
    }

    $output .= $packages;
}

return $output;