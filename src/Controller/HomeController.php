<?php

namespace App\Controller;

use App\Entity\General;
use App\Repository\GeneralRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $generalRepository;

    public function __construct(GeneralRepository $generalRepository)
    {
        $this->generalRepository = $generalRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Accueil";
        
        return $this->render('home/index.html.twig', compact('general', 'page'));
    }
}
