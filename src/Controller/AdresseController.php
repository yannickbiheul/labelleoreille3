<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Form\AdresseType;
use App\Repository\AdresseRepository;
use App\Repository\GeneralRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/adresse")
 */
class AdresseController extends AbstractController
{
    private $generalRepository;

    public function __construct(GeneralRepository $generalRepository)
    {
        $this->generalRepository = $generalRepository;
    }

    /**
     * @Route("/", name="adresse_index", methods={"GET"})
     */
    public function index(AdresseRepository $adresseRepository): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Accueil";

        return $this->render('adresse/index.html.twig', [
            'adresses' => $adresseRepository->findAll(),
            'general' => $general,
            'page' => $page,
        ]);
    }

    /**
     * @Route("/new", name="adresse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $adresse->setUser($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adresse);
            $entityManager->flush();

            $this->addFlash('adresse_message', 'Your adress has been saved');
            return $this->redirectToRoute('account');
        }

        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Accueil";

        return $this->render('adresse/new.html.twig', [
            'adresse' => $adresse,
            'form' => $form->createView(),
            'general' => $general,
            'page' => $page,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adresse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Adresse $adresse): Response
    {
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('adresse_message', 'Your address has been edited');
            return $this->redirectToRoute('account');
        }

        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Accueil";

        return $this->render('adresse/edit.html.twig', [
            'adresse' => $adresse,
            'form' => $form->createView(),
            'general' => $general,
            'page' => $page,
        ]);
    }

    /**
     * @Route("/{id}", name="adresse_delete", methods={"POST"})
     */
    public function delete(Request $request, Adresse $adresse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adresse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adresse);
            $entityManager->flush();
            $this->addFlash('adresse_message', 'Your address has been deleted');
        }

        return $this->redirectToRoute('account');
    }
}
