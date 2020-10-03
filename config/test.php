<?php

declare(strict_types=1);

return [
    'aliases' => [
        '@root' => dirname(__DIR__, 1),
        '@asset' => '@root/tests/public/assets',
        '@assetUrl' => '/baseUrl',
        '@converter' => '@root/tests/public/asset-converter',
        '@npm' => '@root/node_modules',
    ],
];
