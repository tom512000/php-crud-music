<?php

namespace Tests\Crud\Collection;

use Entity\Album;
use Entity\Collection\AlbumCollection;
use Tests\CrudTester;

class AlbumCollectionCest
{
    public function findByArtistId(CrudTester $I)
    {
        $expectedAlbums = [
            ['id' => 419, 'name' => 'The Big 4: Live From Sofia, Bulgaria', 'year' => 2010, 'genreId' => 4, 'artistId' => 17, 'coverId' => 251],
            ['id' => 330, 'name' => 'Death Magnetic', 'year' => 2008, 'genreId' => 4, 'artistId' => 17, 'coverId' => 326],
            ['id' => 44, 'name' => '2004/10/15 Quebec City, QC', 'year' => 2004, 'genreId' => 4, 'artistId' => 17, 'coverId' => 132],
            ['id' => 131, 'name' => 'St. Anger', 'year' => 2003, 'genreId' => 4, 'artistId' => 17, 'coverId' => 373],
            ['id' => 132, 'name' => 'St. Anger DVD', 'year' => 2003, 'genreId' => 4, 'artistId' => 17, 'coverId' => 302],
            ['id' => 416, 'name' => 'S&M', 'year' => 1999, 'genreId' => 4, 'artistId' => 17, 'coverId' => 320],
            ['id' => 405, 'name' => 'Garage Inc.', 'year' => 1998, 'genreId' => 4, 'artistId' => 17, 'coverId' => 348],
            ['id' => 178, 'name' => 'Live in Detroit', 'year' => 1998, 'genreId' => 4, 'artistId' => 17, 'coverId' => 307],
            ['id' => 135, 'name' => 'Reload', 'year' => 1997, 'genreId' => 4, 'artistId' => 17, 'coverId' => 344],
            ['id' => 20, 'name' => 'Load', 'year' => 1996, 'genreId' => 4, 'artistId' => 17, 'coverId' => 98],
            ['id' => 404, 'name' => 'Live Shit: Binge & Purge in Mexico City', 'year' => 1993, 'genreId' => 4, 'artistId' => 17, 'coverId' => 361],
            ['id' => 108, 'name' => 'Black Album', 'year' => 1991, 'genreId' => 4, 'artistId' => 17, 'coverId' => 363],
            ['id' => 38, 'name' => 'Prowling Osaka', 'year' => 1989, 'genreId' => 4, 'artistId' => 17, 'coverId' => 202],
            ['id' => 43, 'name' => '...And Justice For All', 'year' => 1988, 'genreId' => 4, 'artistId' => 17, 'coverId' => 48],
            ['id' => 39, 'name' => 'Master of Puppets', 'year' => 1986, 'genreId' => 4, 'artistId' => 17, 'coverId' => 65],
            ['id' => 121, 'name' => 'Ride The Lightning', 'year' => 1984, 'genreId' => 4, 'artistId' => 17, 'coverId' => 195],
            ['id' => 155, 'name' => 'Kill \'Em All', 'year' => 1983, 'genreId' => 4, 'artistId' => 17, 'coverId' => 260],
            ['id' => 310, 'name' => 'Sucking My Love', 'year' => 1982, 'genreId' => 4, 'artistId' => 17, 'coverId' => 222],
        ];
        $albums = AlbumCollection::findByArtistId(17);
        $I->assertCount(count($expectedAlbums), $albums);
        $I->assertContainsOnlyInstancesOf(Album::class, $albums);
        foreach ($albums as $index => $album) {
            $expectedAlbum = $expectedAlbums[$index];
            $I->assertEquals($expectedAlbum['id'], $album->getId());
            $I->assertEquals($expectedAlbum['name'], $album->getName());
            $I->assertEquals($expectedAlbum['year'], $album->getYear());
            $I->assertEquals($expectedAlbum['genreId'], $album->getGenreId());
            $I->assertEquals($expectedAlbum['artistId'], $album->getArtistId());
            $I->assertEquals($expectedAlbum['coverId'], $album->getCoverId());
        }
    }
}
