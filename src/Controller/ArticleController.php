<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;


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
    
    /**
     * @Route("/{ id }", name="article_id",  methods={"GET"})
     */

    public function affichage(Request $request, ArticleRepository $articlesRepository, EntityManager $manager, Article $articles) : Response 
    {
        return $this->render('article/nouveau.html.twig', [
            'id' =>$articles->getId(),
            "articles" => $articles
        ]);
    }
    /**
     * @Route("/new", name="article_new")
    */
    public function nouveau(Request $request, EntityManager $em) : Response
    {    
                $articles = new Article();
            
                $articles->setTitre(" Titre de l'article N°$i ");
                $articles->setContenu(" Contenu de l'article N° $i ");  
                $articles->setDate(new \DateTime());
                $articles->setResume(" Resume de l'article N° $i ");
                $articles->setImage(" Image N° $i ");
            $em->persist($articles);            
        $em->flush();
    }

    // /**
    //  * @Route("/new", name="articles_nouveau", methods={"GET", "POST"})
    //  */
    // public function nouveau(Request $request, EntityManagerInterface $em): Response
    // {

    //    $articles = new Articles();

    //    // Ici je fais un enregistrement Manuel, on verra la suite avec le  Formulaire
    //    $articles->setTitle(" Titre de mon Article");
    //    $articles->setImage(" photo de mon Article");
    //    $articles->setResume(" Titre de mon Article");
    //    $articles->setDate(new  \DateTime());
    //    $articles->setContenu(" Contenu de mon Article Contenu de mon ArticleContenu de mon ArticleContenu de mon ArticleContenu de mon Article");

    //    // Je persiste Mon Enregistrement
    //    $em->persist($articles);
    //    $em->flush();

    //    // J'envoie au niveau du temple pour l'enregistrement
    //    return $this->render('articles/nouveau.html.twig', [
    //        'articles' => $articles,
    //    ]);

    // }
    
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
