<?php

namespace App\Tests\Entity;

use DateTime;
use App\Entity\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testValide(): void
    {
        $date = new DateTime();
        $location = New Location();
        $location
                ->setTitre("Vrai")
                ->setDate($date)
                ->setCategorie("Voiture")
                ->setImage("1")
                ->setDescription("MERDE")
                ->setValeur("55")
                ->setAdresse("1 place")
                ->setAccessibility("Publier")
                ->setStatus(true)
                ->setALaUne(false)
                ;

        //voir si les assert sont vrai        
        $this->assertTrue($location->getTitre() === "Vrai");
        $this->assertTrue($location->getDate() === $date);
        $this->assertTrue($location->getCategorie() === "Voiture");
        $this->assertTrue($location->getImage() === "1");
        $this->assertTrue($location->getDescription() === "MERDE");
        $this->assertTrue($location->getValeur() === "55");
        $this->assertTrue($location->getAdresse() === "1 place");
        $this->assertTrue($location->getAccessibility() === "Publier");
        $this->assertTrue($location->getStatus() === true);
        $this->assertTrue($location->getALaUne() === false);
    }

    public function testNonValide(): void
    {
        $date = new DateTime();
        $location = new Location();
        $location
                ->setTitre("Vrai")
                ->setDate($date)
                ->setCategorie("Voiture")
                ->setImage("1")
                ->setDescription("MERDE")
                ->setValeur("55")
                ->setAdresse("1 place")
                ->setAccessibility("Publier")
                ->setStatus(true)
                ->setALaUne(false)
            ;
        // $this->assertFalse(false);
        $this->assertFalse($location->getTitre() !== "Vrai");
        $this->assertFalse($location->getDate() !== $date);
        $this->assertFalse($location->getCategorie() !== "Voiture");
        $this->assertFalse($location->getImage() !== "1");
        $this->assertFalse($location->getDescription() !== "MERDE");
        $this->assertFalse($location->getValeur() !== "55");
        $this->assertFalse($location->getAdresse() !== "1 place");
        $this->assertFalse($location->getAccessibility() !== "Publier");
        $this->assertFalse($location->getStatus() !== true);
        $this->assertFalse($location->getALaUne() !== false);
    }

    public function testVide(): void
    {
        $date = new DateTime();
        $location = new Location();
        // $this->assertEmpty(empty);
        $this->assertEmpty($location->getTitre());
        $this->assertEmpty($location->getDate());
        $this->assertEmpty($location->getCategorie());
        $this->assertEmpty($location->getImage());
        $this->assertEmpty($location->getDescription());
        $this->assertEmpty($location->getValeur());
        $this->assertEmpty($location->getAdresse());
        $this->assertEmpty($location->getAccessibility());
        $this->assertEmpty($location->getStatus());
        $this->assertEmpty($location->getALaUne());     
    }
}