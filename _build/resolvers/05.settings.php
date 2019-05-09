<?php
// Устанавливаем системные настройки
if ($object->xpdo) {
    /** @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            
            $errors = [
                '403' => 3, // Страница ошибки 403 «Доступ запрещен»
                '404' => 4, // Страница ошибки 404 «Документ не найден» (404 ошибка)
                '503' => 5  // Страница «Сайт недоступен»
            ];

            foreach($errors as $name => $id) {
                if($res = $modx->getObject('modResource', array('alias' => $name)) ) {
                    $errors[$name] = $res->get('id');
                }   
            }

            $settings = [
                'allow_multiple_emails' => false,
                'friendly_alias_realtime' => true,
                'friendly_urls' => true,
                'friendly_urls_strict' => true,
                'publish_default' => true,
                'use_alias_path' => true,
                'friendly_alias_translit' => 'russian',
                'resource_tree_node_name' => 'menutitle',
                'resource_tree_node_tooltip' => 'alias',
                'unauthorized_page' => $errors['403'],
                'error_page' => $errors['404'],
                'site_unavailable_page' => $errors['503'],
                'error_page_header' => 'HTTP/1.0 404 Not Found',
                'locale' => 'ru_RU.utf8',
                'pdotools_fenom_default' => true,
                'pdotools_fenom_modx' => true,
                'pdotools_fenom_parser' => true,
                'pdotools_elements_path' => '{core_path}/',
                'request_method_strict' => true,
                'tinycompressor_tinypng_upload_enable' => true,
                'tinymcerte.plugins' => 'advlist autolink lists modximage charmap print preview anchor visualblocks searchreplace code fullscreen insertdatetime media table contextmenu paste modxlink textcolor colorpicker',
                'tinymcerte.toolbar1' => 'undo redo | styleselect | backcolor forecolor bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            ];
            foreach ($settings as $key => $value) {
                /** @var modSystemSetting $setting */
                if ($setting = $modx->getObject('modSystemSetting', ['key' => $key])) {
                    $setting->set('value', $value);
                    $setting->save();
                }
            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}

return true;