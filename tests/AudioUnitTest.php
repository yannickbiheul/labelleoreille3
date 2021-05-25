<?php

namespace App\Tests;

use App\Entity\Audio;
use PHPUnit\Framework\TestCase;

class AudioUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $audio = new Audio;

        $audio->setLien('lien')
            ->setNom('nom');

        $this->assertTrue($audio->getLien() === 'lien');
        $this->assertTrue($audio->getNom() === 'nom');
    }

    public function testIsFalse()
    {
        $audio = new Audio;

        $audio->setLien('lien')
            ->setNom('nom');

        $this->assertFalse($audio->getLien() === 'false');
        $this->assertFalse($audio->getNom() === 'false');
    }

    public function testIsEmpty()
    {
        $audio = new Audio;

        $this->assertEmpty($audio->getLien());
        $this->assertEmpty($audio->getNom());
    }
}
