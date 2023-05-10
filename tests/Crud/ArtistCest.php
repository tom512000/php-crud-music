<?php

namespace Tests\Crud;

use Entity\Artist;
use Entity\Exception\EntityNotFoundException;
use Tests\CrudTester;

class ArtistCest
{
    public function findById(CrudTester $I)
    {
        $artist = Artist::findById(4);
        $I->assertSame(4, $artist->getId());
        $I->assertSame('Slipknot', $artist->getName());
    }

    public function findByIdThrowsExceptionIfArtistDoesNotExist(CrudTester $I)
    {
        $I->expectThrowable(EntityNotFoundException::class, function () {
            Artist::findById(PHP_INT_MAX);
        });
    }

}
