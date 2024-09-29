<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Data\Cache;
use Bitrix\Main\Application;

$cache = Cache::createInstance();
$taggedCache = Application::getInstance()->getTaggedCache();

$cachePath = 'testChachePath';
$cacheTtl = 3600;
$cacheKey = 'testCacheKey';

if ($cache->initCache($cacheTtl, $cacheKey, $cachePath)) {
    $vars = $cache->getVars();
} elseif ($cache->startDataCache()) {
    $taggedCache->startTagCache($cachePath);
    $vars = [
        'date' => date('d.m.Y H:i:s'),
        'rand' => rand(0, 999999),
    ];
    $taggedCache->registerTag('iblock_id_1');
    $taggedCache->registerTag('iblock_id_2');

    $cacheInvalid = false;
    if ($cacheInvalid) {
        $taggedCache->abortTagCache();
        $cache->abortDataCache();
    }

    $taggedCache->endTagCache();
    $cache->endDataCache($vars);
}

var_dump($vars);
