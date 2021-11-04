<?php

namespace App\Controller;

use App\Entity\Article;
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
     * @Route("/", name="articles_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'article' => $articleRepository->findAll(),
        ]);
    }
    
     /**
     * @Route("/new", name="article_new")
    */
    public function nouveau(Request $request, EntityManagerInterface $em) : Response
    {    
                $articles = new Article();
            
                $articles->setTitre(" Titre de l'article");
                $articles->setContenu(" Contenu de l'article");  
                $articles->setDate(new \DateTime());
                $articles->setResume(" Resume de l'article");
                $articles->setImage(" Image de l'article");
            $em->persist($articles);            
        $em->flush();
        return $this->render('article/nouveau.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/{id}", name="articles_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {
        return $this->render('article/affichage.html.twig', [
            'id'=>$article->getId(),
            'article' => $article,
        ]);
    }

}
