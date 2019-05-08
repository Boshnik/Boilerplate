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
        'value'     => '0',
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
    ]
];