<?php

namespace App\Tests;

use App\Entity\Image;
use PHPUnit\Framework\TestCase;

class ImageUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $image = new Image;

        $image->setNom('nom');

        $this->assertTrue($image->getNom() === 'nom');
    }

    public function testIsFalse()
    {
        $image = new Image;

        $image->setNom('nom');

        $this->assertFalse($image->getNom() === 'false');
    }

    public function testIsEmpty()
    {
        $image = new Image;

        $this->assertEmpty($image->getNom());
    }
}
