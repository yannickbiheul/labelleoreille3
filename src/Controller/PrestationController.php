<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\AudioRepository;
use App\Repository\CategorieRepository;
use App\Repository\GeneralRepository;
use App\Repository\PrestationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PrestationController extends AbstractController
{
    private $generalRepository;
    private $prestationRepository;
    private $categorieRepository;
    private $audioRepository;

    public function __construct(GeneralRepository $generalRepository, PrestationRepository $prestationRepository, 
    CategorieRepository $categorieRepository, AudioRepository $audioRepository)
    {
        $this->generalRepository = $generalRepository;
        $this->prestationRepository = $prestationRepository;
        $this->categorieRepository = $categorieRepository;
        $this->audioRepository = $audioRepository;
    }

    /**
     * @Route("/prestation", name="prestation")
     */
    public function index(): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Prestations";
        $prestations = $this->prestationRepository->findAll();
        $categories = $this->categorieRepository->findAll();
        $audios = $this->audioRepository->findAll();

        return $this->render('prestation/index.html.twig', compact('general', 'page', 'prestations', 'categories', 'audios'));
    }

    /**
     * @Route("/showPrestations/{id}", name="show_prestations")
     */
    public function showPrestations(?Categorie $categorie): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Prestations";
        $categories = $this->categorieRepository->findAll();
        $audios = $this->audioRepository->findAll();

        if ($categorie) {
            $prestations = $categorie->getPrestations()->getValues();
        } else {
            return $this->redirectToRoute('prestation');
        }

        return $this->render("prestation/index.html.twig", compact('general', 'page', 'prestations', 'categories', 'audios'));
    }
}
