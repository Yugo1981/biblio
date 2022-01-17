<?php

use App\Entity\Auteur;
namespace App\Tests\Entity;

use App\Entity\Auteur;
use PHPUnit\Framework\TestCase;

class AuteurTest extends TestCase
{
    public function testValide(): void
    {
        $auteur = New Auteur();
        $auteur
            ->setNoms("Valdo")
            ->setPrenoms("Fab")
            ->setMail("Toto@toto.fr")
            ->setPassword("123")
            ;
        $this->assertTrue($auteur->getNoms() === "Valdo");
        $this->assertTrue($auteur->getPrenoms() === "Fab");
        $this->assertTrue($auteur->getMail() === "Toto@toto.fr");
        $this->assertTrue($auteur->getPassword() === "123");

    }

    public function testNonValide(): void
    {
        $auteur = new Auteur();
        $auteur
            ->setNoms("Valdo")
            ->setPrenoms("Fab")
            ->setMail("Toto@toto.fr")
            ->setPassword("123")
            ;
        // $this->assertTrue(true);
        $this->assertFalse($auteur->getNoms() !== "Valdo");
        $this->assertFalse($auteur->getPrenoms() !== "Fab");
        $this->assertFalse($auteur->getMail() !== "Toto@toto.fr");
        $this->assertFalse($auteur->getPassword() !== "123");
    }

    public function testVide(): void
    {
        $auteur = new Auteur();
        // $this->assertTrue(true);
        $this->assertEmpty($auteur->getNoms());
        $this->assertEmpty($auteur->getPrenoms());
        $this->assertEmpty($auteur->getMail());
        $this->assertEmpty($auteur->getPassword());
    }
}
