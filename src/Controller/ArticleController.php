<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Form\ArticleType;
use App\Entity\Commentaires;
use App\Form\CommentairesType;
use Doctrine\ORM\EntityManager;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
                            TextType::class,[
                                'label' =>'Resume' ,
                                'attr' => ['placeholder' => 'Résumé'],
                                'required' => 'true'
                            ])
                        ->add('contenu',
                            TextType::class,[
                                'label' =>'Contenu' ,
                                'attr' => ['placeholder' => 'Contenu'],
                                'required' => 'true'
                            ])
                        ->add('image' ,
                            TextType::class,[
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

                        ->add('Envoyer', SubmitType::class)

            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $manager->persist($articles); 
            $manager->flush();

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
     * @Route("/{id}", name="articles_show", methods={"GET"})
     */
    public function show(Article $article, Request $request, EntityManagerInterface $manager): Response
    {    
        $commentaire = new Commentaires(); // Instanciation

        // Creation de mon Formulaire
        $form = $this->createFormBuilder(CommentairesType::class, $commentaire)
                ->add('Auteur',
                    TextType::class,[
                        'label' =>'Auteur' ,
                        'attr' => ['placeholder' => 'Auteur'],
                        'required' => 'true'
                    ])

                ->add('Mail',
                    TextType::class,[
                        'label' =>'Mail' ,
                        'attr' => ['placeholder' => 'Mail'],
                        'required' => 'true'
                    ])
                ->add('date',
                    DateTimeType::class,[
                        'label' =>'Date' ,
                        'attr' => ['placeholder' => 'Date'],
                        'required' => 'true'
                    ])
                ->add('commentaire' ,
                    TextareaType::class,[
                        'label' =>'Commentaire' ,
                        'attr' => ['placeholder' => 'Commentaire'],
                        'required' => 'true'
                    ])                

            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($commentaire);
            $article->addCommentaire($commentaire);            
            $manager->flush();
        }

        // $commentaires = new Commentaires();
        // $commentairesForm = $this->createForm(CommentairesType::class, $commentaires);

        // $commentairesForm->handleRequest($request);

        // if($commentairesForm->isSubmitted() && $commentairesForm->isValid()) {
        //     $commentaires->setDate(new \DateTime())
        //                 ->setArticle($article);
        //     $manager->persist($commentaires);

        //     $manager->flush();

    //         return $this->redirectToRoute('articles_show' , ['id' => $article->getId()
    //     ]);
    // }
    
        return $this->render('article/affichage.html.twig', [
            // 'id'=>$article->getId(),
            'article' => $article,
            'form' => $form->createView()
            //'commentairesForm' => $commentairesForm->createView()
        ]);
    }
}