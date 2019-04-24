<?php

$errors = [
    '403' => 3, // Страница ошибки 403 «Доступ запрещен»
    '404' => 4, // Страница ошибки 404 «Документ не найден» (404 ошибка)
    '503' => 5  // Страница «Сайт недоступен»
];

foreach($errors as $name => $id) {
    if( $res = $this->modx->getObject('modResource', array('alias' => $name)) ) {
        $errors[$name] = $res->get('id');
    }   
}

return [
    'allow_multiple_emails' => [
        'namespace' => 'core',
        'area'      => 'authentication',
        'xtype'     => 'combo-boolean',
        'value'     => '0',
    ],
    'friendly_alias_realtime' => [
        'namespace' => 'core',
        'area'      => 'furls',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'friendly_urls' => [
        'namespace' => 'core',
        'area'      => 'furls',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'friendly_urls_strict' => [
        'namespace' => 'core',
        'area'      => 'furls',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'publish_default' => [
        'namespace' => 'core',
        'area'      => 'site',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'use_alias_path' => [
        'namespace' => 'core',
        'area'      => 'furls',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'friendly_alias_translit' => [
        'namespace' => 'core',
        'area'      => 'furls',
        'xtype'     => 'textfield',
        'value'     => 'russian',
    ],
    'resource_tree_node_name' => [
        'namespace' => 'core',
        'area'      => 'manager',
        'xtype'     => 'textfield',
        'value'     => 'menutitle',
    ],
    'resource_tree_node_tooltip' => [
        'namespace' => 'core',
        'area'      => 'manager',
        'xtype'     => 'textfield',
        'value'     => 'alias',
    ],
    'unauthorized_page' => [
        'namespace' => 'core',
        'area'      => 'site',
        'xtype'     => 'textfield',
        'value'     => $errors['403'],
    ],
    'error_page' => [
        'namespace' => 'core',
        'area'      => 'site',
        'xtype'     => 'textfield',
        'value'     => $errors['404'],
    ],
    'site_unavailable_page' => [
        'namespace' => 'core',
        'area'      => 'site',
        'xtype'     => 'textfield',
        'value'     => $errors['503'],
    ],
    'error_page_header' => [
        'namespace' => 'core',
        'area'      => 'site',
        'xtype'     => 'textfield',
        'value'     => 'HTTP/1.0 404 Not Found',
    ],
    'locale' => [
        'namespace' => 'core',
        'area'      => 'language',
        'xtype'     => 'textfield',
        'value'     => 'ru_RU.utf8',
    ],
    'pdotools_fenom_default' => [
        'namespace' => 'pdotools',
        'area'      => '',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'pdotools_fenom_modx' => [
        'namespace' => 'pdotools',
        'area'      => '',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'pdotools_fenom_parser' => [
        'namespace' => 'pdotools',
        'area'      => '',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'pdotools_elements_path' => [
        'namespace' => 'pdotools',
        'area'      => '',
        'xtype'     => 'textfield',
        'value'     => '{core_path}/',
    ],
    'request_method_strict' => [
        'namespace' => 'core',
        'area'      => '',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    // 'pdotools_fenom_options' => [
    //     'namespace' => 'pdotools',
    //     'area'      => '',
    //     'xtype'     => 'textfield',
    //     'value'     => '{"strip":true}',
    // ],
    'tinycompressor_tinypng_upload_enable' => [
        'namespace' => 'tinycompressor',
        'area'      => '',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'tinymcerte.plugins' => [
        'namespace' => 'tinymcerte',
        'area'      => '',
        'xtype'     => 'textfield',
        'value'     => 'advlist autolink lists modximage charmap print preview anchor visualblocks searchreplace code fullscreen insertdatetime media table contextmenu paste modxlink textcolor colorpicker',
    ],
    'tinymcerte.toolbar1' => [
        'namespace' => 'tinymcerte',
        'area'      => '',
        'xtype'     => 'textfield',
        'value'     => 'undo redo | styleselect | backcolor forecolor bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    ],
    'boilerplate_compress_output_html' => [
        'namespace' => 'boilerplate',
        'name'      => 'setting_compress_output_html',  
        'area'      => 'default',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'boilerplate_tpl_css' => [
        'namespace' => 'boilerplate',
        'name'      => 'setting_boilerplate_tpl_css',  
        'area'      => 'tpl',
        'xtype'     => 'textfield',
        'value'     => '<link rel="preload" href="[[+file]]" as="style" onload="this.onload=null;this.rel='."'".stylesheet ."'".'"'.' >'
    ],
    'boilerplate_tpl_js' => [
        'namespace' => 'boilerplate',
        'name'      => 'setting_boilerplate_tpl_js',  
        'area'      => 'tpl',
        'xtype'     => 'textfield',
        'value'     => '<link rel="preload" href="[[+file]]" as="script"><script src="[[+file]]" defer></script>'
    ],
    'boilerplate_social' => [
        'xtype' => 'textfield',
        'value' => '[["behance","Behance"], ["dribbble", "Dribbble"], ["facebook-f","Facebook"], ["github","Github"],["google-plus-g","Google Plus"],["instagram","Instagram"],["linkedin","LinkedIn"],["odnoklassniki","Odnoklassniki"],["pinterest","Pinterest"],["skype","Skype"],["slack","Slack"],["telegram","Telegram"],["twitter","Twitter"],["viber","Viber"],["vimeo","Vimeo"],["vk","Vkontakte"],["whatsapp","WhatsApp"],["youtube","Youtube"]]',
        'area' => 'social',
    ],
];