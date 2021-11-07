<?php

namespace App\Controller;


use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Form\CategorieType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @Route("/categorie")
 */

class CategorieController extends AbstractController
{

    /**
     * @Route ("/nouvelcategorie" , name="categorie.nouvelcategorie" , methods={"GET" , "POST"})
     */

    public function pageForm(Request $request, EntityManagerInterface $manager)
    {
        $categorie =new Categorie(); // Instanciation

        // Creation de mon Formulaire
        $form = $this->createFormBuilder($categorie) 
                    ->add('Titre')
                    ->add('Resume')                  

            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($categorie); 
            $manager->flush();

            return $this->redirectToRoute('categorie.nouvelcategorie', 
            ['id'=>$categorie->getId()]); // Redirection vers la page
        }
       
        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('categorie/catnew.html.twig', [
            'formCategorie' => $form->createView()
        ]);
    }

    /**
     * @Route("/newform" , name="newform" , methods={"GET" , "POST"})
     */

    public function newformtype(Request $request) : Response
    {
        $category = New Categorie();
        $form = $this->createForm(CategorieType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('categorie');
        }

        return $this->render('categorie/new3.html.twig' , [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="categorie")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorie_new")
     */

    public function nouveau(Request $request, EntityManagerInterface $em) : Response
    {    
                $categorie = new Categorie();
            
                $categorie->setTitre(" Categorie ");
                $categorie->setResume(" Resume de la catégorie");
            $em->persist($categorie);            
        $em->flush();
        return $this->render('categorie/nouveau.html.twig', [
            'categorie' => $categorie,
        ]);
    }

      /**
     * @Route("/{id}", name="categories_show", methods={"GET"})
     */
    public function show(Categorie $categorie): Response
    {
        return $this->render('categorie/affichage.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}
