<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Repository\AuteurRepository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
     * @Route("/auteur")
     */

class AuteurController extends AbstractController
{    
      /**
     * @Route("/newformtype" , name="newwithform" , methods={"GET" , "POST"})
     */

    public function newwithformtype(Request $request, UserPasswordEncoderInterface $encoder) : Response
    {
        $auteur = New Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $auteur->setPassword(
            $encoder->encodePassword(
                    $auteur,
                    $form->get('password')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($auteur);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('auteur_index');
        }

        return $this->render('auteur/new3.html.twig' , [
            'auteur' => $auteur,
            'formAuteur' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit_auteur", methods={"GET" , "POST"})
     */
    public function edition(Request $request, Auteur $auteur, EntityManagerInterface $manager)
    {
        // Creation de mon Formulaire
        $form = $this->createFormBuilder($auteur) 
                    ->add('Noms')
                    ->add('Prenoms')
                    ->add('Mail')
                    ->add('Envoyer', SubmitType::class)

            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $manager->persist($articles); 
            $manager->flush();

            return $this->redirectToRoute(
                'auteur_show',
                ['id' => $auteur->getId()]
            ); // Redirection vers la page
        }
       
        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('auteur/edit.html.twig', [
            'formAuteur' => $form->createView()
        ]);
    }

     /**
     * @Route("/delete/{id}" , name="delete_auteur")
     */

    public function delete(Request $request, Auteur $auteur, EntityManagerInterface $manager, AuteurRepository $repo, $id)
    {
        $manager->remove($auteur);
        $manager->flush();

        return $this->redirectToRoute('auteur_index');
    }


    /**
     * @Route("/", name="auteur_index")
     */
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('auteur/index.html.twig', [
            'auteur' => $auteurRepository->findAll(),
        ]);
    }

     /**
     * @Route("/{id}", name="auteur_show", methods={"GET"})
     */
    public function show(Auteur $auteur): Response
    {
        return $this->render('auteur/affichage.html.twig', [
            'id'=>$auteur->getId(),
            'auteur' => $auteur,
        ]);
    }
}
