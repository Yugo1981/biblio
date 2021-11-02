<?php

namespace App\DataFixtures;

use App\Entity\Utilisateurs;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UtilisateursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    // {

        
    //     for ($i=0; $i<20 ; $i++ ) 
    //     { 
    //         $articles = new Article();
            
    //         $articles->setTitre(" Titre de l'article N°$i ")
    //                 ->setContenu(" Contenu de l'article N° $i ")
    //                 ->setDate(new \DateTime());   
            
    //         $manager->persist($articles);
    //     }
    //  $manager->flush();
    // }
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');

            for ($i=0 ; $i<20 ; $i++ )
            {
                $utilisateurs = new Utilisateurs();
                $nom = ["Follereau","Nwelha","Planiteye","Palakot","Nabi","Khassaowhneh","Ndao","Thuet","Traore","Lopez"];
                $prenom = ["Fabrice","Paul","Pierre","Jacques","Igor","Valéry","Ange","Rudy","Modou","Moaath"];
                $photo = ["1","2","3","4","5"];
                $role = ["Admin","Utilisateur"];
                shuffle($nom);
                shuffle($prenom);
                shuffle($photo);
                shuffle($role);
            
                $utilisateurs->setNoms($nom[0])
                        ->setPrenoms($prenom[0])
                        ->setPhoto($photo[0])
                        ->setDateNaissance(New \Datetime())
                        ->setLogin("user $i")
                        ->setPassword("mdp $i")
                        ->setAdresse($faker->address)
                        ->setEmail($faker->email)
                        ->setRole($role[0]);
            $manager->persist($utilisateurs);
            }
        $manager->flush();
    }
}
