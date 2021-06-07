<?php

namespace App\Controller;

use App\Entity\General;
use App\Repository\UserRepository;
use App\Repository\GeneralRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $generalRepository;
    private $userRepository;

    public function __construct(GeneralRepository $generalRepository, 
    UserRepository $userRepository)
    {
        $this->generalRepository = $generalRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Accueil";
        $admin = $this->userRepository->findOneBy(['nom' => 'Fourel']);
        
        return $this->render('home/index.html.twig', compact('general', 'page', 'admin'));
    }
}
