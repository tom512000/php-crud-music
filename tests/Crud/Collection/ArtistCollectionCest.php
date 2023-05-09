<?php

namespace Tests\Crud\Collection;

use Entity\Artist;
use Entity\Collection\ArtistCollection;
use Tests\CrudTester;

class ArtistCollectionCest
{
    public function findAll(CrudTester $I)
    {
        $expectedArtists = [
            ['id' => 40, 'name' => 'Joe Cocker'],
            ['id' => 89, 'name' => 'Justin Bieber'],
            ['id' => 59, 'name' => 'Lance & Donna'],
            ['id' => 17, 'name' => 'Metallica'],
            ['id' => 13, 'name' => 'Pantera'],
            ['id' => 4, 'name' => 'Slipknot'],
            ['id' => 26, 'name' => 'System Of A Down'],
            ['id' => 6, 'name' => 'ZZ Top'],
        ];

        $artists = ArtistCollection::findAll();
        $I->assertCount(count($expectedArtists), $artists);
        $I->assertContainsOnlyInstancesOf(Artist::class, $artists);
        foreach ($artists as $index => $artist) {
            $expectedArtist = $expectedArtists[$index];
            $I->assertEquals($expectedArtist['id'], $artist->getId());
            $I->assertEquals($expectedArtist['name'], $artist->getName());
        }
    }
}
