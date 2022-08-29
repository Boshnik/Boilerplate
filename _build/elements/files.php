<?php

return [
    'robots.txt' => [
        'source' => $this->config['root'] . '_build/source/robots.txt',
        'target' => "return MODX_BASE_PATH;",
    ],
    'tinymcerte' => [
        'source' => $this->config['root'] . '_build/source/tinymcerte/js/external-config.json',
        'target' => "return MODX_ASSETS_PATH . 'components/tinymcerte/js/';",
    ],
    'templates' => [
        'source' => $this->config['root'] . 'core/components/boilerplate/elements/templates',
        'target' => "return MODX_CORE_PATH . 'elements/';",
    ],
    'chunks' => [
        'source' => $this->config['root'] . 'core/components/boilerplate/elements/chunks',
        'target' => "return MODX_CORE_PATH . 'elements/';",
    ]
];