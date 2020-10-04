<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Yiisoft\Assets\AssetConverter;
use Yiisoft\Assets\AssetConverterInterface;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisher;
use Yiisoft\Assets\AssetPublisherInterface;

/* @var array $params */

return [
    LoggerInterface::class => NullLogger::class,

    AssetConverterInterface::class => static function (AssetConverter $assetConverter) use ($params) {
        if (
            $params['yiisoft/assets']['assetConverter']['command']['from'] !== '' &&
            $params['yiisoft/assets']['assetConverter']['command']['to'] !== '' &&
            $params['yiisoft/assets']['assetConverter']['command']['command'] !== ''
        ) {
            $assetConverter->setCommand(
                $params['yiisoft/assets']['assetConverter']['command']['from'],
                $params['yiisoft/assets']['assetConverter']['command']['to'],
                $params['yiisoft/assets']['assetConverter']['command']['command'],
            );
        }

        $assetConverter->setForceConvert($params['yiisoft/assets']['assetConverter']['forceConvert']);

        return $assetConverter;
    },

    AssetPublisherInterface::class => static function (AssetPublisher $assetPublisher) use ($params) {
        $assetPublisher->setAppendTimestamp($params['yiisoft/assets']['assetPublisher']['appendTimestamp']);

        if ($params['yiisoft/assets']['assetPublisher']['assetMap'] != []) {
            $assetPublisher->setAssetMap($params['yiisoft/assets']['assetPublisher']['assetMap']);
        }

        if ($params['yiisoft/assets']['assetPublisher']['basePath'] !== '') {
            $assetPublisher->setBasePath($params['yiisoft/assets']['assetPublisher']['basePath']);
        }

        if ($params['yiisoft/assets']['assetPublisher']['baseUrl'] !== '') {
            $assetPublisher->setBaseUrl($params['yiisoft/assets']['assetPublisher']['baseUrl']);
        }

        $assetPublisher->setForceCopy($params['yiisoft/assets']['assetPublisher']['forceCopy']);
        $assetPublisher->setLinkAssets($params['yiisoft/assets']['assetPublisher']['linkAssets']);

        return $assetPublisher;
    },

    AssetManager::class => static function (AssetManager $assetManager, ContainerInterface $container) use ($params) {
        $assetManager->setConverter($container->get(AssetConverterInterface::class));
        $assetManager->setPublisher($container->get(AssetPublisherInterface::class));

        if ($params['yiisoft/assets']['assetManager']['bundles'] !== []) {
            $assetManager->setBundles($params['yiisoft/assets']['assetManager']['bundles']);
        }

        if ($params['yiisoft/assets']['assetManager']['register'] !== []) {
            $assetManager->register($params['yiisoft/assets']['assetManager']['register']);
        }

        return $assetManager;
    },
];
