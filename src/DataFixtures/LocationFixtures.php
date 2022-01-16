<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Location;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;


class LocationFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void   
    {
        //Utilisation de fixtures avec faker
        $faker = Faker\Factory::create('fr_FR');
        
       //Creation de location

       for ($k=0 ; $k<1000 ; $k++ )
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
                   ->setTitre("Titre numéro $k")
                   ->setcategorie($categorie[0])
                   ->setImage($image[0])
                   ->setDescription("Description de $k")
                   ->setValeur($valeur[0])
                   ->setAdresse($faker->address)
                   ->setAccessibility($acces[0])
                   ->setStatus($status[0])
                   ->setALaUne($a_la_une[0]);
                   
       $manager->persist($locations);
       }
    $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['group5'];
    }
}
