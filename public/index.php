<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Entity\Collection\ArtistCollection;
use Html\WebPage;

$webpage = new WebPage();
$webpage->setTitle("Artistes");

$tab = ArtistCollection::findAll();

for ($i = 0; $i < count($tab); $i++) {
    $verif = $webpage->escapeString($tab[$i]->getName());
    $webpage->appendContent("\t<p><a href='/artist.php?artistId={$tab[$i]->getId()}'>$verif</a></p>\n");
}

echo $webpage->toHTML();
