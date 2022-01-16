<?php

namespace App\Tests\Entity;

use App\Entity\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testValide(): void
    {
        $location = New Location();
        $location
                ->setTitre("Vrai");

        //voir si les assert sont vrai        
        $this->assertTrue($location->getTitre() === "Vrai");
    }
}
