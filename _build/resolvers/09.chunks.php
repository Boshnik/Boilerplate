<?php
// Меняем контент главного шаблона
if ($object->xpdo) {
	/** @var modX $modx */
	$modx =& $object->xpdo;
	
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			break;
        case xPDOTransport::ACTION_UPGRADE:
            if (!empty($options['update_chunks'])) {
                foreach ($options['update_chunks'] as $v) {
                    if ($chunk = $modx->getObject('modChunk', array('name' => $v))) {
                        foreach ($transport->vehicles as $item) {
                            /** @var xPDOTransportVehicle $vehicle */
                            if ($item['class'] == 'modCategory' && $vehicle = $transport->get($item['filename'])) {
                                foreach ($vehicle->payload['related_objects']['Chunks'] as $item2) {
                                    if ($data = json_decode($item2['object'], true)) {
                                        if ($data['name'] == $v) {
                                            $chunk->set('snippet', $data['snippet']);
                                            $chunk->save();
                                            $modx->log(modX::LOG_LEVEL_INFO, 'Updated chunk "<b>' . $v . '</b>"');
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