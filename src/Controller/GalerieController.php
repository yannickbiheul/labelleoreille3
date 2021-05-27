<?php

namespace App\Controller;

use App\Repository\GeneralRepository;
use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalerieController extends AbstractController
{
    /**
     * @Route("/galerie", name="galerie")
     */
    public function index(GeneralRepository $generalRepository, 
    PhotoRepository $photoRepository): Response
    {
        $general = $generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = 'Galerie Photos';

        $photos = $photoRepository->findAll();

        return $this->render('galerie/index.html.twig', compact('general', 'page', 'photos'));
    }
}
