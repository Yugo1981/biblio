<?php

namespace App\DataFixtures;

use Faker;
use app\Entity\Auteur;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;


class AuteurFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void   
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');
        
         // Création des auteurs :
         for($f=0 ; $f<1000 ; $f++ )
         {
             $auteur = New Auteur();
             $auteur->setNoms($faker->lastName);
             $auteur->setPrenoms($faker->firstName);
             $auteur->setMail($faker->email);
             $auteur->setPassword($faker->password);   

             $manager->persist($auteur);
        }        
    $manager->flush();
    }
    public static function getGroups(): array
     {
        return ['group2'];
     }
}