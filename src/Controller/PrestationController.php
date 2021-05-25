<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\GeneralRepository;
use App\Repository\PrestationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PrestationController extends AbstractController
{
    /**
     * @Route("/prestation", name="prestation")
     */
    public function index(GeneralRepository $generalRepository, 
    PrestationRepository $prestationRepository, 
    CategorieRepository $categorieRepository): Response
    {
        $general = $generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Prestations";
        $prestations = $prestationRepository->findAll();
        $categories = $categorieRepository->findAll();
        return $this->render('prestation/index.html.twig', compact('general', 'page', 'prestations', 'categories'));
    }
}
