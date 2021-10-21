<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;

 /**
     * @Route("/article")
     */
    
    class ArticleController extends AbstractController
    {
    /**
     * @Route("/", name="article_index")
     */

    // 1e Methode
    
    public function index(): Response
    {   
        $repo= $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles,
        ]);
    }
     
    
    // /**
    //  * @Route("/new", name="article_new", methods={"GET","POST"})
    //  */
    // public function new_article(Request $request): Response
    // {
    //     // Je fais appelle à Doctrine/Manager pour l'insertion de mes données
    //     $em = $this->getDoctrine()->getManager();

    //     // Je donne des valeurs à mon Article
    //     $articles = new Article();
    //     $articles->setTitre("Le Doctrine au Coeur de Symfony");
    //     $articles->setContenu("Un très court article.");
    // //    $articles->setDate(2021-10-20-14-51-45);

    // // Je Prepare et je persite 
    //     $em->persist($articles);
    //     $em->flush();

    // // J'appelle la vue sur laquelle je vais afficher mes articles    
    //     return $this->render('article/nouveau.html.twig', [
    //         'articles' => $articles,
    //     ]);
    // }


    // /**
    //  * @Route("/{id}", name="articles_affichage", methods={"GET"})
    //  */
    // public function show(Article $articles, ArticleRepository $articlesRepository, Request $request, EntityManagerInterface $manager): Response
    // {
    //     return $this->render('article/affichage.html.twig', [
    //         'id'=>$articles->getId(),
    //         'articles' => $articles,
    //     ]);
    // }
}
