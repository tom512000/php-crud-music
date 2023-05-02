<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Database\MyPdo;
use Html\WebPage;

$webpage = new WebPage();
$webpage->setTitle("Table de Pythagore");

$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT id, name
    FROM artist
    ORDER BY name
SQL
);

$stmt->execute();


while (($ligne = $stmt->fetch()) !== false) {
    $verif = $webpage->escapeString($ligne['name']);
    $webpage->appendContent("      <p>{$verif}\n");
}


echo $webpage->toHTML();
