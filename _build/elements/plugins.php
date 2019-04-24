<?php

return [
    'Boilerplate' => [
        'file' => 'boilerplate',
        'description' => '',
        'events' => [
            'OnMODXInit' => [],
            'pdoToolsOnFenomInit' => [],
            'OnWebPageInit' => [],
            'OnWebPagePrerender' => [],
            'OnManagerPageInit' => [],
        ],
    ],
    'managerBreadCrumbs' => [
        'file' => 'managerbreadcrumbs',
        'description' => 'Хлебные крошки в админке',
        'events' => [
            'OnDocFormPrerender' => []
        ]
    ],
];