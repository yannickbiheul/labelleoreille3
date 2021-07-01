<?php

namespace App\Controller;

use App\Entity\General;
use App\Repository\ActuRepository;
use App\Repository\UserRepository;
use App\Repository\GeneralRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $generalRepository;
    private $actuRepository;

    public function __construct(GeneralRepository $generalRepository, ActuRepository $actuRepository)
    {
        $this->generalRepository = $generalRepository;
        $this->actuRepository = $actuRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Accueil";
        $actus = $this->actuRepository->findAll();
        
        return $this->render('home/index.html.twig', compact('general', 'page', 'actus'));
    }
}
