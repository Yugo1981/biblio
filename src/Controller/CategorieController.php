<?php

namespace App\Controller;


use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Entity\CategorieSearch;

use Doctrine\ORM\EntityManager;
use App\Form\CategorieSearchType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/categorie")
 */

class CategorieController extends AbstractController
{

        /**
     * @Route("/", name="categorie")
     */
    public function index(CategorieRepository $categorieRepository, Request $request): Response
    {
        $categoriesearch = New CategorieSearch();
        $form_search = $this->createForm(CategorieSearchType::class, $categoriesearch);
        $form_search->handleRequest($request);

        //J'initialise A tableau des categories, 
        $article = [];
        
        if($form_search->isSubmitted() && $form_search->isValid()) {
            $category = $categoriesearch->getCategorie();   
                if ($category!="") 
                // //si on a fourni un nom d'une categorie on affiche toutes les categories ayant ce nom
                $article = $category->getArticle();
                else   
                // si aucun nom fourni, j'affiche tous les categories
            // $categorie= $categorieRepository->findArticlesPubliés();
            $categoriesearch = $categorieRepository->findAll();
        }
        return $this->render('categorie/index.html.twig', [
            // 'categorie' => $categorieRepository->findAll(),
            'nbcategorie' => count($categorieRepository->findAll()),
            'form_search' => $form_search->createView(),
            'categoriesearch' => $categoriesearch,
        ]);
    }
    
    /**
     * @Route ("/nouvelcategorie" , name="categorie.nouvelcategorie" , methods={"GET" , "POST"})
     */

    public function pageForm(Request $request, EntityManagerInterface $manager)
    {
        $categorie = new Categorie(); // Instanciation

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

            return $this->redirectToRoute(
                'categorie.nouvelcategorie',
                ['id' => $categorie->getId()]
            ); // Redirection vers la page
        }

        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('categorie/catnew.html.twig', [
            'formCategorie' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/edit/{id}", name="edit_categorie", methods={"GET" , "POST"})
     */

    public function edition(Request $request, Categorie $categorie, EntityManagerInterface $manager)
    {
        // Creation de mon Formulaire
        $form = $this->createFormBuilder($categorie) 
                    ->add('Titre')
                    ->add('Resume')
            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $manager->persist($articles); 
            $manager->flush();

            return $this->redirectToRoute(
                'categories_show',
                ['id' => $categorie->getId()]
            ); // Redirection vers la page
        }      
        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('categorie/catedit.html.twig', [
            'formCategorie' => $form->createView()
        ]);
    }
    
     /**
     * @Route("/delete/{id}" , name="delete_categorie")
     */

    public function delete(Request $request, Categorie $categorie, EntityManagerInterface $manager)
    {
        $manager->remove($categorie);
        $manager->flush();

        return $this->redirectToRoute('categorie');
    }

    /**
     * @Route("/newform" , name="cat_newform" , methods={"GET" , "POST"})
     */

    public function newformtype(Request $request): Response
    {
        $category = new Categorie();
        $form = $this->createForm(CategorieType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('categorie');
        }

        return $this->render('categorie/new3.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/new", name="categorie_new")
     */

    public function nouveau(Request $request, EntityManagerInterface $em): Response
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
     *  @param CategorieRepository , $categorierepo
     *  @Route ("/valdo" , name="valdo_categorie")
     */
    public function rechercher(CategorieRepository $categorierepo): Response
    {
        $categorie = $categorierepo->findBy(array
            ('titre' => 'Policier') ,
            array('resume' => 'desc') , 5,5);
            // Premier 5 en para la limite
            // Second 5 le offset de pagination        

        return $this->render('categorie/recherche.html.twig', [
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
