<?php

namespace App\DataFixtures;

use App\Entity\Categorie;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<20 ; $i++ ) 
            { 
                $categories = new Categorie();
                $categorie = ["Adulte","Jeunesse", "Roman","Policier","Poésie","Aventure","Histoire","Informatique" ];
                shuffle($categorie);
                $categories->setTitre($categorie[0])
                        ->setResume(" Résumé de la catégorie de $i ");
                
                $manager->persist($categories);
            }

        $manager->flush();
    }
}
