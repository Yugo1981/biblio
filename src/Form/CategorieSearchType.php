<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\CategorieSearch;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CategorieSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('categorie', EntityType::class, [
            // looks for choices from this entity
            'class' => Categorie::class,
            
            // Label du champ    
            'label'  => 'Categorie',
            
            'placeholder' => 'Sélectionner',

            // Sur quelle propriete je fais le choix
            'choice_label' => 'titre',
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
            // Configure your form options here
            'data_class' => CategorieSearch::class,
        ]);
    }
}
