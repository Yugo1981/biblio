<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',
             TextType::class,[
                 'label' =>'Titre' ,
                 'required' => 'true'
             ])
            ->add('resume',
             TextType::class,[
                 'label' =>'Resume' ,
                 'required' => 'true'
             ])
            ->add('contenu',
             TextType::class,[
                 'label' =>'Contenu' ,
                 'required' => 'true'
             ])
            ->add('image' ,
             TextType::class,[
                 'label' =>'Image' ,
                 'required' => 'true'
             ])

            ->add('Envoyer', SubmitType::class)
        ;        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}