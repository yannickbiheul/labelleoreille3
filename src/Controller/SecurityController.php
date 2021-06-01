<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Repository\GeneralRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    private $generalRepository;
    private $manager;

    public function __construct(GeneralRepository $generalRepository, 
                                EntityManagerInterface $manager)
    {
        $this->generalRepository = $generalRepository;
        $this->manager = $manager;
    }

    /**
     * @Route("/register", name="security_register")
     */
    public function register(Request $request, 
                            UserPasswordEncoderInterface $encoder): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Inscription";

        $user = new User;
        $formulaire = $this->createForm(RegisterType::class, $user);

        // Analyse de la requête par le formulaire
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            // Traitement des données reçues du formulaire
            $password_hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password_hash);

            $this->manager->persist($user);
            $this->manager->flush();
            return $this->redirectToRoute("security_login");
        }

        $form = $formulaire->createView();

        return $this->render('security/index.html.twig', compact('general', 'page', 'form'));
    }

    /**
     * @Route("/login", name="security_login")
     */
    public function login(): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $page = "Connexion";

        return $this->render('security/login.html.twig', compact('general', 'page'));
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
        
    }

}
