<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Repository\AuteurRepository;
use App\Form\AuteurType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

/**
     * @Route("/auteur")
     */

class AuteurController extends AbstractController
{
    
    // /**
    //  * @Route("/new" , name"auteur_new")
    //  */

    // public function pageForm(Request $request, EntityManagerInterface $manager)
    // {
    //     $auteur =new Auteur(); // Instanciation

    //     // Creation de mon Formulaire
    //     $form = $this->createFormBuilder($auteur) 
    //                 ->add('Noms')
    //                 ->add('Prénoms')
    //                 ->add('Mail')

    //         // Demande le résultat
    //         ->getForm();

    //     // Analyse des Requetes & Traitement des information 
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $manager->persist($auteur); 
    //         $manager->flush();

    //         return $this->redirectToRoute('auteur_index', 
    //         ['id'=>$auteur->getId()]); // Redirection vers la page
    //     }
       
    //     // Redirection du Formulaire vers le TWIG pour l’affichage avec
    //     return $this->render('auteur/new2.html.twig', [
    //         'formAuteur' => $form->createView()
    //     ]);
    // }


      /**
     * @Route("/newformtype" , name="newwithform" , methods={"GET" , "POST"})
     */

    public function newwithformtype(Request $request) : Response
    {
        $auteur = New Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($auteur);
            $entityManager->flush();

            return $this->redirectToRoute('auteur_index');
        }

        return $this->render('auteur/new3.html.twig' , [
            'auteur' => $auteur,
            'form' => $form->createView(),
        ]);
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