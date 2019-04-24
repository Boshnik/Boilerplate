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
    'minifyx_hooks_libs' => [
        'source' => $this->config['root'] . '_build/source/minifyx/hooks/libs.php',
        'target' => "return MODX_CORE_PATH . 'components/minifyx/hooks/';",
    ],
    'minifyx_hooks_ms2' => [
        'source' => $this->config['root'] . '_build/source/minifyx/hooks/ms2.php',
        'target' => "return MODX_CORE_PATH . 'components/minifyx/hooks/';",
    ]
];