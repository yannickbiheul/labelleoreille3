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
    public function index(GeneralRepository $generalRepository, ActuRepository $actuRepository): Response
    {
        $general = $generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Actualités";
        $actus = $actuRepository->findAll();

        return $this->render('actu/index.html.twig', compact('general', 'page', 'actus'));
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(GeneralRepository $generalRepository, ActuRepository $actuRepository, $id): Response
    {
        $general = $generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Actualités";
        $actu = $actuRepository->find($id);

        if (!$actu) {
            return $this->redirectToRoute('actu');
        }

        return $this->render('actu/show.html.twig', compact('general', 'page', 'actu'));
    }

}
