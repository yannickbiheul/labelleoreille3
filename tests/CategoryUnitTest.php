<?php

namespace App\Tests;

use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $categorie = new Categorie;

        $categorie->setNom('nom');

        $this->assertTrue($categorie->getNom() === 'nom');
    }

    public function testIsFalse()
    {
        $categorie = new Categorie;

        $categorie->setNom('nom');

        $this->assertFalse($categorie->getNom() === 'false');
    }

    public function testIsEmpty()
    {
        $categorie = new Categorie;

        $this->assertEmpty($categorie->getNom());
    }
}
