<?php

namespace App\Form;

use App\Entity\Utilisateurs;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('noms' ,
            TextType::class,[
                'label' =>'Nom' ,
                'required' => 'true'
            ])
            ->add('prenoms' ,
            TextType::class,[
                'label' => 'Prénom' ,
                'required' => 'true'
            ])
            ->add('photo')
            ->add('date_naissance' ,
            BirthdayType::class,[
                'label' => 'Date de naissance' ,
                'required' => 'true'
            ])
            ->add('login' ,
            TextType::class,[
                'label' => 'Login' ,
                'required' => 'true'
            ])
            ->add('password' ,
            PasswordType::class,[
                'label' => 'Mot de passe' ,
                'required' => 'true'
            ])
            ->add('adresse' ,
            TextType::class,[
                'label' => 'Adresse' ,
                'required' => 'true'
            ])
            ->add('email' ,
            EmailType::class,[
                'label' => 'Email' ,
                'required' => 'true'
            ])
            ->add('role' ,
            ChoiceType::class,[
                'label' => 'Rôle' ,
                'choices' => [
                    'Utilisateur' => 'Utilisateur',
                    'Admin' => 'Admin'
                ] ,
                'required' => 'true'
            ])
            ->add("Envoyer",SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}
