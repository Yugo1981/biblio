<?php

namespace App\Form;

use App\Entity\Commentaires;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentairesType extends AbstractType
{
    // public function buildForm(FormBuilderInterface $builder, array $options): void
    // {
    //     $builder
    //         ->add('Auteur',
    //          TextType::class,[
    //              'label' =>'Auteur' ,
    //              'attr' => ['placeholder' => 'Auteur'],
    //              'required' => 'true'
    //          ])
    //         ->add('Mail',
    //          EmailType::class,[
    //              'label' =>'Mail' ,
    //              'attr' => ['placeholder' => 'Mail'],
    //              'required' => 'true'
    //          ])
    //         ->add('date',
    //          DateTimeType::class,[
    //              'label' =>'Date' ,
    //              'attr' => ['placeholder' => 'Date'],
    //              'required' => 'true'
    //          ])
    //         ->add('commentaire' ,
    //         TextareaType::class,[
    //              'label' =>'Commentaire' ,
    //              'attr' => ['placeholder' => 'Commentaire'],
    //              'required' => 'true'
    //          ])         
            
    //         ->add('Envoyer', SubmitType::class)
    //     ;        
    // }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaires::class,
        ]);
    }
}