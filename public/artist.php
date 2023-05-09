<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Database\MyPdo;
use Html\WebPage;

if (!isset($_GET["artistId"]) || (!ctype_digit($_GET["artistId"]))) {
    header('Location: /index.php');
    exit;
}
$artistId = (int)$_GET["artistId"];
#$artistId = 17; # Metallica

$webpage = new WebPage();

$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT name
    FROM artist
    WHERE id = :artistId
SQL
);

$stmt->execute([":artistId" => $artistId]);

if (($artist = $stmt->fetch()) === false) {
    http_response_code(404);
    exit;
}

$nom = $artist['name'];
$webpage->setTitle("Albums de $nom");
$webpage->appendContent("<h1>Albums de $nom</h1>\n");

$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT name, year
    FROM album
    WHERE artistId = :artistId
    ORDER BY year DESC, name
SQL
);

$stmt->execute([":artistId" => $artistId]);

while (($ligne = $stmt->fetch()) !== false) {
    $verif = $webpage->escapeString($ligne['name']);
    $webpage->appendContent("         <p>{$ligne['year']} $verif</p>\n");
}

echo $webpage->toHTML();
