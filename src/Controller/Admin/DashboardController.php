<?php

namespace App\Controller\Admin;

use App\Entity\Actu;
use App\Entity\User;
use App\Entity\Audio;
use App\Entity\Categorie;
use App\Entity\Prestation;
use App\Controller\Admin\ActuCrudController;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\GeneralCrudController;
use App\Entity\General;
use App\Entity\Photo;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(GeneralCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('La Belle Oreille | Administration');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Général', 'fas fa-home', General::class);
        yield MenuItem::linkToCrud('Prestations', 'fas fa-newspaper', Prestation::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Audios', 'fas fa-music', Audio::class);
        yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', Actu::class);
        yield MenuItem::linkToCrud('Photos', 'fas fa-camera-retro', Photo::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
    }
}
