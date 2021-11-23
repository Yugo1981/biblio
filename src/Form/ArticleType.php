<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Auteur;
use App\Entity\Commentaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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

             ->add('commentaire', EntityType::class, [
                // Label du champ    
                'label'  => 'Commentaire',
                'placeholder' => 'Sélectionner',
                // looks for choices from this entity
                'class' => Commentaires::class,
                // Sur quelle propriete je fais le choix
                'choice_label' => 'Commentaire',
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                //'expanded' => true,)
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