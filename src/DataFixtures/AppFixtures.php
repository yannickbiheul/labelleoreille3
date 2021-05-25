<?php

namespace App\DataFixtures;

use App\Entity\General;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // GENERAL
        $general = new General;

        $general->setLogo('logo.png')
            ->setLogo2('logo2.png')
            ->setLogo3('logo3.png')
            ->setPhraseTitre('Des voix en mémoire')
            ->setCitation('Quoi de plus riche et émouvant que d’entendre
            et de conserver la voix de ceux que l’on aime')
            ->setDescription('Réalisation de reportage audio pour les particuliers et les professionnels')
            ->setLienFacebook('https://www.facebook.com/La-Belle-Oreille-101656721318094/?modal=admin_todo_tour')
            ->setLienInstagram('https://www.instagram.com/foureljeanne/')
            ->setProprietaire('Jeanne Fourel')
            ->setPhoto('jeanne_fourel.jpg');

        $manager->persist($general);

        $manager->flush();
    }
}
