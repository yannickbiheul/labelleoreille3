<?php

namespace App\Controller;

use App\Repository\GeneralRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/cgu")
 */
class CGUController extends AbstractController
{
    private $generalRepository;

    public function __construct(GeneralRepository $generalRepository)
    {
        $this->generalRepository = $generalRepository;
    }

    /**
     * @Route("/conditions-generales-utilisation", name="cgu_conditions")
     */
    public function index(): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Conditions Générales d'Utilisation";

        return $this->render('cgu/index.html.twig', [
            'controller_name' => 'CGUController',
            'page' => $page,
            'general' => $general,
        ]);
    }
}
