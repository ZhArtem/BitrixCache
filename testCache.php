<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Data\Cache;

$cache = Cache::createInstance();

$cachePath = 'testChachePath';
$cacheTtl = 3600;
$cacheKey = 'testCacheKey';

if ($cache->initCache($cacheTtl, $cacheKey, $cachePath)) {
    $vars = $cache->getVars();
    $cache->output();
} elseif ($cache->startDataCache()) {
    $vars = [
        'date' => date('d.m.Y H:i:s'),
        'rand' => rand(0, 999999),
    ];
    echo 'Вывод произвольного числа: ' . rand(0, 999999) . '<br>';

    $cacheInvalid = false;
    if ($cacheInvalid) {
        $cache->abortDataCache();
    }

    $cache->endDataCache($vars);
}

var_dump($vars);
