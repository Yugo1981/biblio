<?php

namespace App\DataFixtures;

use Faker;
use app\Entity\Utilisateurs;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;


class UtilisateursFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void   
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');
        //Creation d'utilisateur
            
            for ($l=0 ; $l<1000 ; $l++ )
            {
                $utilisateurs = new Utilisateurs();
                $nom = ["Follereau","Nwelha","Planiteye","Palakot","Nabi","Khassaowhneh","Ndao","Thuet","Traore","Lopez"];
                $prenom = ["Fabrice","Paul","Pierre","Jacques","Igor","Valéry","Ange","Rudy","Modou","Moaath"];
                $photo = ["1","2","3","4","5"];
                $role = ["ROLE_USER","ROLE_ADMIN"];
                $civil = ["Monsieur" , "Madame"];
                $statu = ["Publier" , "Depublier" , "Archiver"];
                shuffle($nom);
                shuffle($prenom);
                shuffle($photo);
                shuffle($role);
                shuffle($civil);
                shuffle($statu);
            
                $utilisateurs->setNoms($nom[0])
                        ->setPrenoms($prenom[0])
                        ->setPhoto($photo[0])
                        ->setDateNaissance(New \Datetime())
                        ->setLogin("user $l")
                        ->setPassword($faker->password)
                        ->setAdresse($faker->address)
                        ->setEmail($faker->email)
                        ->setRoles(['ROLE_ADMIN'])
                        ->setCivilite($civil[0])
                        ->setStatut($statu[0]);
            $manager->persist($utilisateurs);
            }
        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['group3'];
    }
}