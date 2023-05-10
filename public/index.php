<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Entity\Collection\ArtistCollection;
use Html\AppWebPage;

$appwebpage = new AppWebPage("Artistes");

$tab = ArtistCollection::findAll();

for ($i = 0; $i < count($tab); $i++) {
    $verif = $appwebpage->escapeString($tab[$i]->getName());
    $appwebpage->appendContent("\t<a href='/artist.php?artistId={$tab[$i]->getId()}'>$verif</a><br>\n");
}

echo $appwebpage->toHTML();
