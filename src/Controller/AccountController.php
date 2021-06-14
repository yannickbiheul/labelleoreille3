<?php

namespace App\Controller;

use App\Repository\GeneralRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/account")
 */
class AccountController extends AbstractController
{
    private $generalRepository;

    public function __construct(GeneralRepository $generalRepository)
    {
        $this->generalRepository = $generalRepository;
    }

    /**
     * @Route("/", name="account")
     */
    public function index(): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Compte Utilisateur";

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'general' => $general,
            'page' => $page,
        ]);
    }
}
