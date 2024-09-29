<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

\Bitrix\Main\Loader::includeModule('iblock');

$query = \Bitrix\Iblock\ElementTable;ElementTable::getList([
    'select' => ['ID', 'NAME'],
    'filter' => ['IBLOCK_ID' => 1],
    'cache' => [
        'ttl' => 600,
        'cache_joins' => true,
    ]
]);

$result = $query->fetch();
