<?php

namespace App\Tests;

use App\Entity\Actu;
use PHPUnit\Framework\TestCase;

class ActuUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $actu = new Actu;

        $actu->setContenu('contenu')
            ->setTitre('titre');

        $this->assertTrue($actu->getContenu() === 'contenu');
        $this->assertTrue($actu->getTitre() === 'titre');
    }

    public function testIsFalse()
    {
        $actu = new Actu;

        $actu->setContenu('contenu')
            ->setTitre('titre');

        $this->assertFalse($actu->getContenu() === 'false');
        $this->assertFalse($actu->getTitre() === 'false');
    }

    public function testIsEmpty()
    {
        $actu = new Actu;

        $this->assertEmpty($actu->getContenu());
        $this->assertEmpty($actu->getTitre());
    }
    
}
