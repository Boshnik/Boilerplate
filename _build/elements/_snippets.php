<?php

return [
    'Social' => [
        'file' => 'social',
        'description' => 'Social snippet to list items',
        'properties' => [
            'tplOuter' => [
                'type' => 'textfield',
                'value' => '@INLINE <ul>{$wrapper}</ul>',
            ],
            'tpl' => [
                'type' => 'textfield',
                'value' => '@INLINE <li><a href="{$link}" target="_blank" title="{$name}"><i class="fab fa-{$name}"></i></a></li>',
            ],
            'sortby' => [
                'type' => 'textfield',
                'value' => 'name',
            ],
            'sortdir' => [
                'type' => 'list',
                'options' => [
                    ['text' => 'ASC', 'value' => 'ASC'],
                    ['text' => 'DESC', 'value' => 'DESC'],
                ],
                'value' => 'ASC',
            ],
            'limit' => [
                'type' => 'numberfield',
                'value' => 10,
            ],
            'outputSeparator' => [
                'type' => 'textfield',
                'value' => "\n",
            ],
            'toPlaceholder' => [
                'type' => 'combo-boolean',
                'value' => false,
            ],
        ],
    ],
];