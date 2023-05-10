<?php

declare(strict_types=1);

namespace Entity;

use Database\MyPdo;
use Entity\Collection\AlbumCollection;
use Entity\Exception\EntityNotFoundException;
use PDO;

class Artist
{
    private int $id;
    private string $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Méthode permettant de retouner un artiste grâce à son id.
     * @param int $id
     * @return Artist
     */
    public static function findById(int $id): Artist
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
                SELECT name, id
                FROM artist
                WHERE id = :id
        SQL
        );
        $stmt->setFetchMode(PDO::FETCH_CLASS, Artist::class);
        $stmt->execute([":id" => $id]);
        $test = $stmt->fetch();
        if (!$test) {
            return throw new EntityNotFoundException();
        } else {
            return $test;
        }
    }

    /**
     * Méthode permettant de retourner tous les albums d'un artiste.
     * @return array
     */
    public function getAlbums(): array
    {
        return AlbumCollection::findByArtistId($this->id);
    }
}
