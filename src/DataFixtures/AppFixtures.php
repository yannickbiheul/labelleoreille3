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
            ->setPhoto('jeanne_fourel.jpg');

        $manager->persist($general);

        // CATEGORIES
        $categorie1 = new Categorie;
        $categorie1->setNom('Particuliers');
        $manager->persist($categorie1);

        $categorie2 = new Categorie;
        $categorie2->setNom('Entreprises');
        $manager->persist($categorie2);

        // PRESTATIONS
        $prestation1 = new Prestation;

        $prestation1->setTitre("Album sonore d’événements familiaux et amicaux")
            ->setContenu1("A l’occasion d’un événement familial ou amical, je me mêle aux festivités avec mon micro et interviewe les invités au sujet de l’événement. Chacun est libre de parler comme il le souhaite de la fête et des personnes fêtées. Et pour les plus timides, je sais les mettre à l’aise par de petites questions sympathiques…Au cours du montage, j’intègre entre chaque interview de courts extraits musicaux et des sons de l’ambiance de la fête.")
            ->setContenu2("Un cadeau original et précieux : un album sonore dans lequel les organisateurs de l’événement auront le plaisir de réentendre la voix de tous ceux et de toutes celles qu’ils aiment et qui auront partagé avec eux ce moment unique.")
            ->addCategorie($categorie1);
        
        $manager->persist($prestation1);

        $prestation2 = new Prestation;

        $prestation2->setTitre("Recueil de souvenirs de vie")
            ->setContenu1("Vous avez dans votre entourage ou votre cercle familial une personne qui vous est chère et dont vous voudriez conserver la voix et quelques souvenirs de vie en mémoire.
            Je me propose de réaliser son interview avec ou sans vous.
            Au cours du montage, j’intègre de courts extraits musicaux et ambiances sonores reflétant sa personnalité et sa vie.")
            ->setContenu2("Un cadeau précieux que vous pourrez conserver toute votre vie: la voix de ceux que vous aimez.")
            ->addCategorie($categorie1);
        
        $manager->persist($prestation2);

        // ADMIN
        $admin = new User;

        $admin->setEmail('labelleoreille29@gmail.com')
            ->setNom('Fourel')
            ->setPrenom('Jeanne')
            ->setRoles(['ROLE_ADMIN'])
            ->setTelephone('06 81 55 87 76')
            ->setVille('Quimper')
            ->setCreatedAt(new \DateTime());

        $password = $this->encoder->encodePassword($admin, 'password');
        $admin->setPassword($password);

        $manager->persist($admin);

        // USERS
        $faker = Factory::create('fr_FR');
        $users = [];

        for ($i = 0; $i < 50; $i++) {
            $user = new User();
            $user->setEmail($faker->email)
                ->setNom($faker->lastName())
                ->setPrenom($faker->firstName())
                ->setRoles(['ROLE_USER'])
                ->setPassword($faker->password())
                ->setCreatedAt(new \DateTime());
            $manager->persist($user);
            $users[] = $user;
        }

        // IMAGES
        $image1 = new Image;

        $image1->setNom('telegramme_20_10_2020.jpeg');

        $manager->persist($image1);

        // ACTUS
        $actu1 = new Actu;

        $actu1->setTitre('Article Télegramme du 20 octobre 2020')
            ->setImage($image1)
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
