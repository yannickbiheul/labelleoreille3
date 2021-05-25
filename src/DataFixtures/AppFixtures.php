<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\General;
use App\Entity\Prestation;
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

        $manager->flush();
    }
}
