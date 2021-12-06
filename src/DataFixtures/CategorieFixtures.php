<?php

namespace App\DataFixtures;

use App\Entity\Categorie;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');

        for ($i=0; $i<20 ; $i++ ) 
            { 
                $categories = new Categorie();
                $categorie = ["Adulte","Jeunesse", "Roman","Policier","Poésie","Aventure","Histoire","Informatique" ];
                shuffle($categorie);
                $categories->setTitre($categorie[0])
                        ->setResume($faker->sentence());
                
                $manager->persist($categories);
            }

        $manager->flush();
    }
}
