<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Database\MyPdo;

MyPDO::setConfiguration('mysql:host=mysql;dbname=cutron01_music;charset=utf8', 'web', 'web');

$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT id, name
    FROM artist
    ORDER BY name
SQL
);

$stmt->execute();

$html = <<<HTML
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <title>Table de Pythagore</title>
    </head>
    <body>\n
HTML;

while (($ligne = $stmt->fetch()) !== false) {
    $html .= "      <p>{$ligne['name']}\n";
}

$html .= <<<HTML
    </body>
</html>
HTML;

echo $html;
