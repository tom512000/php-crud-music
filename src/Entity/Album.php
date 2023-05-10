<?php

declare(strict_types=1);

namespace Entity;

class Album
{
    private int $id;
    private string $name;
    private int $year;
    private int $artistId;
    private int $genreId;
    private int $coverId;

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
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getArtistId(): int
    {
        return $this->artistId;
    }

    /**
     * @return int
     */
    public function getGenreId(): int
    {
        return $this->genreId;
    }

    /**
     * @return int
     */
    public function getCoverId(): int
    {
        return $this->coverId;
    }
}
