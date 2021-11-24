<?php
// Копируем статические файлы
return [
    'robots.txt' => [
        'source' => $this->config['root'] . '_build/source/robots.txt',
        'target' => "return MODX_BASE_PATH;",
    ],
    'tinymcerte' => [
        'source' => $this->config['root'] . '_build/source/tinymcerte/js/external-config.json',
        'target' => "return MODX_ASSETS_PATH . 'components/tinymcerte/js/';",
    ]
];