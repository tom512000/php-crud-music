<?php

declare(strict_types=1);

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Album;
use PDO;

class AlbumCollection
{
    /**
     * Méthode permettant de retourner tous les albums d'un artiste.
     *
     * @return Album[]
     */
    public static function findByArtistId(int $artistId): array
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
            SELECT id, name, year, artistId, genreId, coverId
            FROM album
            WHERE artistId = :artistId
            ORDER BY year DESC, name
        SQL
        );
        $stmt->execute([":artistId" => $artistId]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Album::class);
        return $stmt->fetchAll();
    }
}
