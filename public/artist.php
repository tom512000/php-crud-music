<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Entity\Artist;
use Entity\Collection\AlbumCollection;
use Html\WebPage;

if (!isset($_GET["artistId"]) || (!ctype_digit($_GET["artistId"]))) {
    header('Location: /index.php');
    exit;
}

$webpage = new WebPage();

$artist = Artist::findById((int)$_GET["artistId"]);
if (!$artist) {
    http_response_code(404);
    exit;
}

$webpage->setTitle("Albums de {$artist->getName()}");
$webpage->appendContent("<h1>Albums de {$artist->getName()}</h1>\n");

$tab = AlbumCollection::findByArtistId($artist->getId());

for ($i = 0; $i < count($tab); $i++) {
    $verif = $webpage->escapeString($tab[$i]->getName());
    $webpage->appendContent("\t<p>{$tab[$i]->getYear()} $verif</p>\n");
}

echo $webpage->toHTML();
