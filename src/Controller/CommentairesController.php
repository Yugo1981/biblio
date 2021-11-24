<?php

namespace App\Controller;


use App\Entity\Commentaires;
use App\Repository\CommentairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @Route("/commentaires")
 */

class CommentairesController extends AbstractController
{
    /**
     * @Route ("/newcom" , name="newcom" , methods={"GET" , "POST"})
     */

    public function pageForm(Request $request, EntityManagerInterface $manager)
    {
        $commentaire = new Commentaires(); // Instanciation

        // Creation de mon Formulaire
        $form = $this->createFormBuilder($commentaire)
                ->add('Auteur',
                    TextType::class,[
                        'label' =>'Auteur' ,
                        'attr' => ['placeholder' => 'Auteur'],
                        'required' => 'true'
                    ])
                ->add('Mail',
                    EmailType::class,[
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
                    ->add('article', EntityType::class, [
                        // Label du champ    
                        'label'  => 'Article',
                        'placeholder' => 'Sélectionner',
                        // looks for choices from this entity
                        'class' => Article::class,
                        // Sur quelle propriete je fais le choix
                        'choice_label' => 'titre',
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
            $manager->persist($commentaire);
            $manager->flush();

            return $this->redirectToRoute(
                'newcom',
                ['id' => $commentaire->getId()]
            );
        }

        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('commentaires/comnew.html.twig', [
            'formCommentaire' => $form->createView()
        ]);
    }

     /**
     * @Route("/edit/{id}", name="edit_commentaires", methods={"GET" , "POST"})
     */
    public function edition(Request $request, Commentaires $commentaires, EntityManagerInterface $manager)
    {
        // Creation de mon Formulaire
        $form = $this->createFormBuilder($commentaires)
        ->add('Auteur',
        TextType::class,[
            'label' =>'Auteur' ,
            'attr' => ['placeholder' => 'Auteur'],
            'required' => 'true'
        ])
       ->add('Mail',
        EmailType::class,[
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
       
       ->add('Envoyer', SubmitType::class) 
                    
            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $manager->persist($commentaires); 
            $manager->flush();

            return $this->redirectToRoute(
                'commentaires_show',
                ['id' => $commentaires->getId()]
            ); // Redirection vers la page
        }
       
        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('commentaires/edit.html.twig', [
            'formCommentaires' => $form->createView()
        ]);
    }

     /**
     * @Route("/delete/{id}" , name="commentaires_delete")
     */

    public function delete(Request $request, Commentaires $commentaires, EntityManagerInterface $manager, CommentairesRepository $repo, $id)
    {
        $manager->remove($commentaires);
        $manager->flush();

        return $this->redirectToRoute('commentaires_index');
    }

    /**
     * @Route("/", name="commentaires_index")
     */
    public function index(CommentairesRepository $commentairesRepository): Response
    {
        return $this->render('commentaires/index.html.twig', [
            'commentaires' =>  $commentairesRepository->findAll(),
        ]);
    }

     /**
     * @Route("/{id}", name="commentaires_show", methods={"GET"})
     */
    public function show(Commentaires $commentaires): Response
    {
        return $this->render('commentaires/affichage.html.twig', [
            'id'=>$commentaires->getId(),
            'commentaires' => $commentaires,
        ]);
    }
}
