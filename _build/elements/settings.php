<?php

return [
    'boilerplate_compress_output_html' => [
        'namespace' => 'boilerplate',
        'name'      => 'setting_boilerplate_compress_output_html',  
        'area'      => 'default',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'boilerplate_hide_vtabs_tv' => [
        'namespace' => 'boilerplate',
        'name'      => 'setting_boilerplate_hide_vtabs_tv',  
        'area'      => 'default',
        'xtype'     => 'combo-boolean',
        'value'     => '1',
    ],
    'boilerplate_csp' => [
        'namespace' => 'boilerplate',
        'name'      => 'setting_boilerplate_csp',
        'area'      => 'default',
        'xtype'     => 'textfield',
        'value'     => "Content-Security-Policy: script-src 'nonce-rAnd0mrAnd0m'; default-src 'self' *.googleapis.com *.gstatic.com *.googletagmanager.com *.jsdelivr.net;",
    ],
];