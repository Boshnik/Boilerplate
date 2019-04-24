<?php
// Меняем контент главного шаблона
if ($object->xpdo) {
	/** @var modX $modx */
	$modx =& $object->xpdo;
	
	$static_file = 'core/components/boilerplate/elements/templates/base.tpl';
	
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
		case xPDOTransport::ACTION_UPGRADE:
			
			foreach ($modx->getCollection('modTemplate') as $template) {
                if( $template->templatename == 'Начальный шаблон' || $template->id == 1) {
                    $template->set('source', 1);
                    $template->set('static', 1);
                    $template->set('static_file', $static_file);
                    $template->save();
                }
            }

			break;

		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;