<?php

namespace App\Tests;

use App\Entity\Prestation;
use PHPUnit\Framework\TestCase;

class PrestationUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $prestation = new Prestation;

        $prestation->setContenu1('contenu1')
            ->setContenu2('contenu2')
            ->setContenu3('contenu3')
            ->setContenu4('contenu4')
            ->setTitre('titre');

        $this->assertTrue($prestation->getContenu1() === 'contenu1');
        $this->assertTrue($prestation->getContenu2() === 'contenu2');
        $this->assertTrue($prestation->getContenu3() === 'contenu3');
        $this->assertTrue($prestation->getContenu4() === 'contenu4');
        $this->assertTrue($prestation->getTitre() === 'titre');
    }

    public function testIsFalse()
    {
        $prestation = new Prestation;

        $prestation->setContenu1('contenu1')
            ->setContenu2('contenu2')
            ->setContenu3('contenu3')
            ->setContenu4('contenu4')
            ->setTitre('titre');

        $this->assertFalse($prestation->getContenu1() === 'false');
        $this->assertFalse($prestation->getContenu2() === 'false');
        $this->assertFalse($prestation->getContenu3() === 'false');
        $this->assertFalse($prestation->getContenu4() === 'false');
        $this->assertFalse($prestation->getTitre() === 'false');
    }

    public function testIsEmpty()
    {
        $prestation = new Prestation;

        $this->assertEmpty($prestation->getContenu1());
        $this->assertEmpty($prestation->getContenu2());
        $this->assertEmpty($prestation->getContenu3());
        $this->assertEmpty($prestation->getContenu4());
        $this->assertEmpty($prestation->getTitre());
    }
}
