<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Actu;
use App\Entity\User;
use App\Entity\Image;
use App\Entity\Photo;
use App\Entity\General;
use App\Entity\Categorie;
use App\Entity\Prestation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
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
            ->setPhoto('essai_presentation.png');

        $manager->persist($general);

        // CATEGORIES
        $categorie1 = new Categorie;
        $categorie1->setNom('Particuliers');
        $manager->persist($categorie1);

        $categorie2 = new Categorie;
        $categorie2->setNom('Entreprises');
        $manager->persist($categorie2);

        // ADMIN
        $admin = new User;

        $admin->setEmail('labelleoreille29@gmail.com')
            ->setNom('Fourel')
            ->setPrenom('Jeanne')
            ->setRoles(['ROLE_ADMIN'])
            ->setTelephone('06 81 55 87 76')
            ->setVille('Quimper')
            ->setCreatedAt(new \DateTime());

        $password = $this->encoder->encodePassword($admin, '123456');
        $admin->setPassword($password);

        $manager->persist($admin);

        $admin2 = new User;

        $admin2->setEmail('yannickbiheul@outlook.fr')
            ->setNom('Biheul')
            ->setPrenom('Yannick')
            ->setRoles(['ROLE_ADMIN'])
            ->setTelephone('06 23 55 68 64')
            ->setVille('Quimper')
            ->setCreatedAt(new \DateTime());

        $password = $this->encoder->encodePassword($admin2, '123456');
        $admin2->setPassword($password);

        $manager->persist($admin2);

        // ACTUS
        $actu1 = new Actu;

        $actu1->setTitre('Article Télegramme du 20 octobre 2020')
            ->setImage('telegramme_20_10_2020.jpeg')
            ->setCreatedAt(new \DateTime());

        $manager->persist($actu1);

        // PHOTOS
        $photo2 = new Photo;
        $photo2->setNom('coat_ty_dreux.jpg');
        $manager->persist($photo2);

        $photo3 = new Photo;
        $photo3->setNom('fougeres1.jpg');
        $manager->persist($photo3);

        $photo4 = new Photo;
        $photo4->setNom('fougeres2.jpg');
        $manager->persist($photo4);

        $photo5 = new Photo;
        $photo5->setNom('fougeres3.jpg');
        $manager->persist($photo5);

        $photo6 = new Photo;
        $photo6->setNom('fougeres4.jpg');
        $manager->persist($photo6);

        $photo7 = new Photo;
        $photo7->setNom('fougeres5.jpg');
        $manager->persist($photo7);

        $photo8 = new Photo;
        $photo8->setNom('nevez1.jpg');
        $manager->persist($photo8);

        $photo9 = new Photo;
        $photo9->setNom('nevez2.jpg');
        $manager->persist($photo9);

        $manager->flush();
    }
}
