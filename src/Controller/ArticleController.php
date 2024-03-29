<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Form\ArticleType;
use App\Entity\Commentaires;
use App\Entity\PropertySearch;
use App\Form\CommentairesType;
use Doctrine\ORM\EntityManager;
use App\Form\PropertySearchType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
      /**
     * @Route("/nouvelarticle", name="aarticle.nouvelarticle", methods={"GET", "POST"})
    */
        // Ici on Fait une Enregistrement avec une Formulaire
    
        public function pageForm(Request $request, EntityManagerInterface $manager)
    {
        $articles =new Article(); // Instanciation

        // Creation de mon Formulaire
        $form = $this->createFormBuilder($articles) 
                    ->add('Titre')
                    ->add('Resume')
                    ->add('Contenu')
                    // ->add('Date')
                    ->add('Image')

            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($articles); 
            $manager->flush();

            return $this->redirectToRoute('aarticle.nouvelarticle', 
            ['id'=>$articles->getId()]); // Redirection vers la page
        }
       
        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('article/new2.html.twig', [
            'formArticle' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/edit/{id}", name="edit_article", methods={"GET" , "POST"})
     */
    public function edition(Request $request, Article $articles, EntityManagerInterface $manager)
    {
        // $articles =new Article(); // Instanciation
        // Creation de mon Formulaire
        $form = $this->createFormBuilder($articles) 
                        ->add('titre',
                            TextType::class,[
                                'label' =>'Titre' ,
                                'attr' => ['placeholder' => 'Titre'],
                                'required' => 'true'
                            ])
                        ->add('resume',
                            CKEditorType::class,[
                                'label' =>'Resume' ,
                                'attr' => ['placeholder' => 'Résumé'],
                                'required' => 'true'
                            ])
                        ->add('contenu',
                            CKEditorType::class,[
                                'label' =>'Contenu' ,
                                'attr' => ['placeholder' => 'Contenu'],
                                'required' => 'true'
                            ])
                            ->add('imageFile' ,
                            VichImageType::class,[
                                'label' =>'Image' ,
                                'attr' => ['placeholder' => 'Photo'],
                                'required' => 'true'
                            ])
       
                        ->add('categorie', EntityType::class, [
                        // Label du champ    
                        'label'  => 'Categorie',
                        'placeholder' => 'Sélectionner',
                        // looks for choices from this entity
                        'class' => Categorie::class,
                        // Sur quelle propriete je fais le choix
                        'choice_label' => 'titre',
                        // used to render a select box, check boxes or radios
                        // 'multiple' => true,
                        //'expanded' => true,)
                        ])
       
                        ->add('auteur', EntityType::class, [
                        // Label du champ    
                        'label'  => 'Auteur',
                        'placeholder' => 'Sélectionner',
                        // looks for choices from this entity
                        'class' => Auteur::class,
                        // Sur quelle propriete je fais le choix
                        'choice_label' => 'noms',
                        // used to render a select box, check boxes or radios
                        // 'multiple' => true,
                        //'expanded' => true,)
                        ])

                        ->add('statut',
                            ChoiceType::class,[
                                'label' => 'Statut' ,
                                'choices' => [
                                    'Publier' => 'Publier',
                                    'Dépublier' => 'Dépublier',
                                    'Archiver' => 'Archiver'
                                ] ,
                                'multiple' => false,
                                'expanded' => true,])

                        ->add('Envoyer', SubmitType::class)

            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $manager->persist($articles); 
            $manager->flush();


            // return $this->redirectToRoute('articles_show' , ['slug' => $articles->getSlug()]);
            return $this->redirectToRoute(
                'articles_show',
                ['id' => $articles->getId()]
            ); // Redirection vers la page
        }
       
        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('article/edit.html.twig', [
            'formArticle' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}" , name="delete_article")
     */

    public function delete(Request $request, Article $articles, EntityManagerInterface $manager, ArticleRepository $repo, $id)
    {
        $manager->remove($articles);
        $manager->flush();

        return $this->redirectToRoute('articles_index');
    }

    /**
     * @Route("/newformtype" , name="newform" , methods={"GET" , "POST"})
     */

    public function newwithformtype(Request $request) : Response
    {
        $articleu = New Article();
        $form = $this->createForm(ArticleType::class, $articleu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($articleu);
            $entityManager->flush();

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('article/new3.html.twig' , [
            'articleu' => $articleu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="articles_index")
     */
    public function index(ArticleRepository $articleRepository,Request $request): Response
    {
        $search = New PropertySearch();
        $form_search = $this->createForm(PropertySearchType::class, $search);
        $form_search->handleRequest($request);

        //J'initialise A tableau des articles, 
        $articlesearch = [];
        
        if($form_search->isSubmitted() && $form_search->isValid()) {
            $titre = $search->getTitre();   
                if ($titre!="") 
                //si on a fourni un nom d'article on affiche tous les articles ayant ce nom
                $articlesearch= $articleRepository->findBy(['titre' => $titre] );
                else   
                // si aucun nom fourni, j'affiche tous les articles
            // $articles= $articlesRepository->findArticlesPubliés();
            $articlesearch = $articleRepository->findAll();
        }

        return $this->render('article/index.html.twig', [
            // 'article' => $articleRepository->findAll(),
            'nbarticle' => count($articleRepository->findAll()),
            'form_search' => $form_search->createView(),
            'articlesearch' => $articlesearch,
        ]);
    }

     /**
     * @Route("/indexo", name="articles_indexo", methods={"GET"})
     */
    public function indexo(ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->findByArticleStatut();
        return $this->render('article/indexo.html.twig', [
            'article' => $articleRepository->findByArticleStatut(),
        ]);
    }

     /**
     * @Route("/dqlcategorie", name="articles_dqlcategorie", methods={"GET"})
     */
    public function dqlCategorie(ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->findByArticlePourUneCategorie();
        return $this->render('article/indexo.html.twig', [
            'article' => $articleRepository->findByArticlePourUneCategorie(),
        ]);
    }

       /**
     * @Route("/dqlarticleauteur", name="articles_dqlarticleauteur", methods={"GET"})
     */
    public function dqlArticleAuteur(ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->findArticlePourUnAuteur();
        return $this->render('article/indexo.html.twig', [
            'article' => $articleRepository->findArticlePourUnAuteur(),
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
                // $articles->setDate(new \DateTime());
                $articles->setResume(" Resume de l'article");
                $articles->setImage(" Image de l'article");
            $em->persist($articles);            
        $em->flush();
        return $this->render('article/nouveau.html.twig', [
            'articles' => $articles,
        ]);
    }
 
    /**
     * @Route("/{slug}", name="articles_show", methods={"GET"})
     */

    public function show(ArticleRepository $articleRepository, EntityManagerInterface $manager, Article $article, Request $request)
    {
        $commentaire = new Commentaires(); // Instanciation

            // Creation de mon Formulaire
            $form = $this->createForm(CommentairesType::class, $commentaire);      
            // Analyse des Requetes & Traitement des information 
            $form->handleRequest($request);    
            if ($form->isSubmitted() && $form->isValid())
            {
                $manager->persist($commentaire);
                $article->addCommentaire($commentaire);            
                $manager->flush();

                return $this->redirectToRoute('articles_show' , ['slug' => $article->getSlug()]);
            }    
         
        // Appel à Doctrine & au repository
        // $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        //Recherche d'un auteur avec son identifiant
        // $article = $articleRepository->find($id);
        // Passage vers twig
            // if (!$article) {
                // throw $this->createNotFoundException(
                //     "Navré pas d'article pour cet id : " .$id
                //);       
                // return $this->render('article/erreur.html.twig');
            // }
            return $this->render('article/affichage.html.twig', [
                         // 'id'=>$article->getId(),
                         'article' => $article,
                         'form' => $form->createView()
                    ]);
    }

    //    /**
    //  * @Route("/{id}", name="articles_show", methods={"GET" , "POST"})
    //  */

    // public function show(Article $article, Request $request, EntityManagerInterface $manager): Response
    // {    
    //     $commentaire = new Commentaires(); // Instanciation

    //     // Creation de mon Formulaire
    //     $form = $this->createForm(CommentairesType::class, $commentaire);    

    //     // Analyse des Requetes & Traitement des information 
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $manager->persist($commentaire);
    //         $article->addCommentaire($commentaire);            
    //         $manager->flush();
    //     }

    //     $commentaires = new Commentaires();
    //     $commentairesForm = $this->createForm(CommentairesType::class, $commentaires);

    //     $commentairesForm->handleRequest($request);

    //     if($commentairesForm->isSubmitted() && $commentairesForm->isValid()) {
    //         $commentaires->setDate(new \DateTime())
    //                     ->setArticle($article);
    //         $manager->persist($commentaires);

    //         $manager->flush();

    //         return $this->redirectToRoute('articles_show' , ['id' => $article->getId()
    //     ]);
    // }
    
    //     return $this->render('article/affichage.html.twig', [
    //         // 'id'=>$article->getId(),
    //         'article' => $article,
    //         'form' => $form->createView()
    //         // 'commentairesForm' => $commentairesForm->createView()
    //     ]);
    // }
}