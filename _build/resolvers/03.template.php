<?php

if ($object->xpdo) {
	/** @var modX $modx */
	$modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			foreach ($modx->getCollection('modTemplate') as $template) {
                
                if ($template->id == 1) {
                    $template->set('templatename', 'BaseTemplate');
                    $template->set('content', '{insert "file:templates/base.tpl"}');
                }

                $template->set('category', 0);
                $template->save();
            }
			break;
        case xPDOTransport::ACTION_UPGRADE:
            if (!empty($options['update_templates'])) {
                foreach ($options['update_templates'] as $v) {
                    if ($template = $modx->getObject('modTemplate', array('templatename' => $v))) {
                        foreach ($transport->vehicles as $item) {
                            /** @var xPDOTransportVehicle $vehicle */
                            if ($item['class'] == 'modCategory' && $vehicle = $transport->get($item['filename'])) {
                                foreach ($vehicle->payload['related_objects']['Templates'] as $item2) {
                                    if ($data = json_decode($item2['object'], true)) {
                                        if ($data['templatename'] == $v) {
                                            $template->set('content', $data['content']);
                                            $template->set('category', 0);
                                            $template->save();
                                            $modx->log(modX::LOG_LEVEL_INFO, 'Updated template "<b>' . $v . '</b>"');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;