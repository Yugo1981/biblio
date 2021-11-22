<?php

namespace App\DataFixtures;

use App\Entity\Auteur;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;



class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        
        for ($i=0; $i<20 ; $i++ ) 
        { 
            $articles = new Auteur();
            
            $articles->setNoms($faker->name)
                    ->setPrenoms($faker->lastname)
                    ->setMail($faker->email);   
            
            $manager->persist($articles);
        }
     $manager->flush();
    }
}