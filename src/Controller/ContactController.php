<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\GeneralRepository;
use App\Repository\UserRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
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
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer, 
    FlashBagInterface $flash): Response
    {
        $general = $this->generalRepository->findOneBy(['proprietaire' => 'Jeanne Fourel']);
        $admin = $this->userRepository->findOneBy(['nom' => 'Fourel']);
        $page = "Contact";

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('yannickbiheul@outlook.fr')
                ->subject('Test Symfony Mailer')
                ->text($contact->getMessage());
            $mailer->send($email);
            $flash->add('success', 'Votre message à bien été envoyé, merci !');

            return $this->redirectToRoute('contact');
        }

        $formulaire = $form->createView();

        return $this->render('contact/index.html.twig', compact('general', 'page', 'admin', 'formulaire'));
    }
}
