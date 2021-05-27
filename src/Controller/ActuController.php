<?php

namespace App\Controller;

use App\Repository\ActuRepository;
use App\Repository\GeneralRepository;
use App\Repository\ImageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActuController extends AbstractController
{
    /**
     * @Route("/actu", name="actu")
     */
    public function index(GeneralRepository $generalRepository, 
    ImageRepository $imageRepository, ActuRepository $actuRepository): Response
    {
        $general = $generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Actualités";
        $actus = $actuRepository->findAll();
        $images = $imageRepository->findAll();

        return $this->render('actu/index.html.twig', compact('general', 'page', 'actus', 'images'));
    }
}
