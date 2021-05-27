<?php

namespace App\Tests;

use App\Entity\Photo;
use PHPUnit\Framework\TestCase;

class PhotoUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $photo = new Photo;

        $photo->setNom('nom');

        $this->assertTrue($photo->getNom() === 'nom');
    }

    public function testIsFalse()
    {
        $photo = new Photo;

        $photo->setNom('nom');

        $this->assertFalse($photo->getNom() === 'false');
    }

    public function testIsEmpty()
    {
        $photo = new Photo;

        $this->assertEmpty($photo->getNom());
    }
}
