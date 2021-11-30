<?php

namespace App\Form;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('noms',
            TextType::class,[
                'label' =>'Nom' ,
                'required' => 'true'
            ])
            ->add('prenoms',
            TextType::class,[
                'label' =>'Prénom' ,
                'required' => 'true'
            ])
            ->add('mail',
            EmailType::class,[
                'label' => 'Email' ,
                'required' => 'true'
            ])

            ->add('password' ,
            PasswordType::class,[
                'label' => 'Mot de passe' ,
                'required' => 'true'
            ])

            ->add('Envoyer', SubmitType::class)
        ;        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}