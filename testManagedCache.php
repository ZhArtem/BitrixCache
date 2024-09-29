<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$managedCache = Bitrix\Main\Application::getInstance()->getManagedCache();

$cacheId = 'myCacheKey';
$ttl = 30;

if ($managedCache->read($ttl, $cacheId)) {
    $vars = $managedCache->get($cacheId);
} else {
    $vars = date('r');
    $managedCache->set($cacheId, $vars);
}

var_dump($vars);
