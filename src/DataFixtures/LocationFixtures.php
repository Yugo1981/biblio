<?php

namespace App\DataFixtures;

use App\Entity\Location;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class LocationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void    
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');

            for ($i=0 ; $i<20 ; $i++ )
            {
                $locations = new Location();
                $categorie = ["Adulte","Jeunesse", "Roman","Policier","Poésie","Aventure","Histoire","Informatique" ];
                shuffle($categorie);
                $image = ["1","2","3","4","5"];
                $valeur = ["0.5","1","1.5","2","2.5","5","10","15","20"];
                shuffle($valeur);
                $status = ["Disponible","En prêt","Relance pour rendre"];
                shuffle($status);
                $acces = ["Disponible","Indisponible"];
                shuffle($acces);
                $a_la_une = ["1","2","3","4","5","6"];
                shuffle($a_la_une);
                $locations->setDate(New \Datetime())
                        ->setTitre("Titre numéro $i")
                        ->setcategorie($categorie[0])
                        ->setImage($image[0])
                        ->setDescription("Description de $i")
                        ->setValeur($valeur[0])
                        ->setAdresse($faker->address)
                        ->setAccessibility($acces[0])
                        ->setStatus($status[0])
                        ->setALaUne($a_la_une[0]);
            $manager->persist($locations);
            }
        $manager->flush();
    }
}
