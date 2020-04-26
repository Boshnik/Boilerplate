<?php
// Копируем статические файлы
return [
    'static_file' => [
        'source' => $this->config['root'] . 'assets/libs/',
        'target' => "return MODX_ASSETS_PATH;",
    ],
    'minifyx_group' => [
        'source' => $this->config['root'] . '_build/source/minifyx/config/groups.php',
        'target' => "return MODX_CORE_PATH . 'components/minifyx/config/';",
    ],
    'minifyx_hooks' => [
        'source' => $this->config['root'] . '_build/source/minifyx/hooks/',
        'target' => "return MODX_CORE_PATH . 'components/minifyx/';",
    ],
    'robots.txt' => [
        'source' => $this->config['root'] . '_build/source/robots.txt',
        'target' => "return MODX_BASE_PATH;",
    ],
    'tinymcerte' => [
        'source' => $this->config['root'] . '_build/source/tinymcerte/js/external-config.json',
        'target' => "return MODX_ASSETS_PATH . 'components/tinymcerte/js/';",
    ]
];