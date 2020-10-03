<?php

declare(strict_types=1);

return [
    'aliases' => [
        '@root' => dirname(__DIR__, 1),
        '@asset' => '@root/public/assets',
        '@assetUrl'  => '/baseUrl',
        '@converter' => '@root/public/asset-converter',
        '@npm' => '@root/node_modules',
    ],

    'yiisoft/assets' => [
        'assetConverter' => [
            'command' => [
                'from' => '',
                'to' => '',
                'command' => ''
            ],
            'forceConvert' => false
        ],
        'assetPublisher' => [
            'appendTimestamp' => false,
            'assetMap' => [],
            'basePath' => '',
            'baseUrl' => '',
            'forceCopy' => false,
            'linkAssets' => false,
        ],
        'assetManager' => [
            'bundles' => [
            ],
            'register' => [
            ],
        ],
    ],
];
