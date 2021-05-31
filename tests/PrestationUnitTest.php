<?php

namespace App\Tests;

use App\Entity\Prestation;
use PHPUnit\Framework\TestCase;

class PrestationUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $prestation = new Prestation;

        $prestation->setContenu('contenu')
            ->setTitre('titre');

        $this->assertTrue($prestation->getContenu() === 'contenu');
        $this->assertTrue($prestation->getTitre() === 'titre');
    }

    public function testIsFalse()
    {
        $prestation = new Prestation;

        $prestation->setContenu('contenu')
            ->setTitre('titre');

        $this->assertFalse($prestation->getContenu() === 'false');
        $this->assertFalse($prestation->getTitre() === 'false');
    }

    public function testIsEmpty()
    {
        $prestation = new Prestation;

        $this->assertEmpty($prestation->getContenu());
        $this->assertEmpty($prestation->getTitre());
    }
}
