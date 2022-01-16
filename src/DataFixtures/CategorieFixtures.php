<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class CategorieFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void   
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');

            // Créer 10 Catégories :

            for ($i=0 ; $i<1000 ; $i++ )
            {
                $categorie = new Categorie();

                $categorie->setTitre($faker->sentence())
                        ->setResume($faker->sentence());

                $manager->persist($categorie);                
            }
        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['group1'];
    }
}