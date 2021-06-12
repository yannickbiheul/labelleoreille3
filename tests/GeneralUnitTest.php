<?php

namespace App\Tests;

use App\Entity\General;
use PHPUnit\Framework\TestCase;

class GeneralUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $general = new General;

        $general->setCitation('citation')
            ->setDescription('description')
            ->setLienFacebook('lienFacebook')
            ->setLienInstagram('lienInstagram')
            ->setLogo('logo')
            ->setLogo2('logo2')
            ->setLogo3('logo3')
            ->setPhoto('photo')
            ->setPhraseTitre('phraseTitre')
            ->setProprietaire('proprietaire')
            ->setImageBanniere('imageBanniere')
            ->setTelephone('telephone')
            ->setEmail('email')
            ->setVille('ville')
            ->setBanniereActus('banniereActus');

        $this->assertTrue($general->getCitation() === 'citation');
        $this->assertTrue($general->getDescription() === 'description');
        $this->assertTrue($general->getLienFacebook() === 'lienFacebook');
        $this->assertTrue($general->getLienInstagram() === 'lienInstagram');
        $this->assertTrue($general->getLogo() === 'logo');
        $this->assertTrue($general->getLogo2() === 'logo2');
        $this->assertTrue($general->getLogo3() === 'logo3');
        $this->assertTrue($general->getPhoto() === 'photo');
        $this->assertTrue($general->getPhraseTitre() === 'phraseTitre');
        $this->assertTrue($general->getProprietaire() === 'proprietaire');
        $this->assertTrue($general->getImageBanniere() === 'imageBanniere');
        $this->assertTrue($general->getTelephone() === 'telephone');
        $this->assertTrue($general->getEmail() === 'email');
        $this->assertTrue($general->getVille() === 'ville');
        $this->assertTrue($general->getBanniereActus() === 'banniereActus');
    }

    public function testIsFalse()
    {
        $general = new General;

        $general->setCitation('citation')
            ->setDescription('description')
            ->setLienFacebook('lienFacebook')
            ->setLienInstagram('lienInstagram')
            ->setLogo('logo')
            ->setLogo2('logo2')
            ->setLogo3('logo3')
            ->setPhoto('photo')
            ->setPhraseTitre('phraseTitre')
            ->setProprietaire('proprietaire')
            ->setImageBanniere('imageBanniere')
            ->setTelephone('telephone')
            ->setEmail('email')
            ->setVille('ville')
            ->setBanniereActus('banniereActus');

        $this->assertFalse($general->getCitation() === 'false');
        $this->assertFalse($general->getDescription() === 'false');
        $this->assertFalse($general->getLienFacebook() === 'false');
        $this->assertFalse($general->getLienInstagram() === 'false');
        $this->assertFalse($general->getLogo() === 'false');
        $this->assertFalse($general->getLogo2() === 'false');
        $this->assertFalse($general->getLogo3() === 'false');
        $this->assertFalse($general->getPhoto() === 'false');
        $this->assertFalse($general->getPhraseTitre() === 'false');
        $this->assertFalse($general->getProprietaire() === 'false');
        $this->assertFalse($general->getImageBanniere() === 'false');
        $this->assertFalse($general->getTelephone() === 'false');
        $this->assertFalse($general->getEmail() === 'false');
        $this->assertFalse($general->getVille() === 'false');
        $this->assertFalse($general->getBanniereActus() === 'false');
    }

    public function testIsEmpty()
    {
        $general = new General;

        $this->assertEmpty($general->getCitation());
        $this->assertEmpty($general->getDescription());
        $this->assertEmpty($general->getLienFacebook());
        $this->assertEmpty($general->getLienInstagram());
        $this->assertEmpty($general->getLogo());
        $this->assertEmpty($general->getLogo2());
        $this->assertEmpty($general->getLogo3());
        $this->assertEmpty($general->getPhoto());
        $this->assertEmpty($general->getPhraseTitre());
        $this->assertEmpty($general->getProprietaire());
        $this->assertEmpty($general->getImageBanniere());
        $this->assertEmpty($general->getTelephone());
        $this->assertEmpty($general->getEmail());
        $this->assertEmpty($general->getVille());
        $this->assertEmpty($general->getBanniereActus());
    }
    
}
