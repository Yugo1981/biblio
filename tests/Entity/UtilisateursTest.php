<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Utilisateurs;
use DateTime;

class UtilisateursTest extends TestCase
{
    public function testValide(): void
    {
        $date = new DateTime();
        $utilisateurs = New Utilisateurs();
        $utilisateurs
                    ->setNoms("Yugo")
                    ->setPrenoms("Fab")
                    ->setPhoto("1")
                    ->setLogin("Fabrice")
                    ->setAdresse("1 rue")
                    ->setEmail("Valdo@toto.fr")
                    ->setDateNaissance($date)
                    ;

        $this->assertTrue($utilisateurs->getNoms() === "Yugo");
        $this->assertTrue($utilisateurs->getPrenoms() === "Fab");
        $this->assertTrue($utilisateurs->getPhoto() === "1");
        $this->assertTrue($utilisateurs->getLogin() === "Fabrice");
        $this->assertTrue($utilisateurs->getAdresse() === "1 rue");
        $this->assertTrue($utilisateurs->getEmail() === "Valdo@toto.fr");
        $this->assertTrue($utilisateurs->getDateNaissance() === $date);

    }

    public function testNonValide(): void
    {
        $date = new DateTime();
        $utilisateurs = new Utilisateurs();
        $utilisateurs
                ->setNoms("Yugo")
                ->setPrenoms("Fab")
                ->setPhoto("1")
                ->setLogin("Fabrice")
                ->setAdresse("1 rue")
                ->setEmail("Valdo@toto.fr")
                ->setDateNaissance($date)
            ;
        // $this->assertTrue(true);
        $this->assertFalse($utilisateurs->getNoms() !== "Yugo");
        $this->assertFalse($utilisateurs->getPrenoms() !== "Fab");
        $this->assertFalse($utilisateurs->getPhoto() !== "1");
        $this->assertFalse($utilisateurs->getLogin() !== "Fabrice");
        $this->assertFalse($utilisateurs->getAdresse() !== "1 rue");
        $this->assertFalse($utilisateurs->getEmail() !== "Valdo@toto.fr");
        $this->assertFalse($utilisateurs->getDateNaissance() !== $date);
    }

    public function testVide(): void
    {
        $date = new DateTime();
        $utilisateurs = new Utilisateurs();
        // $this->assertTrue(true);
        $this->assertEmpty($utilisateurs->getNoms());
        $this->assertEmpty($utilisateurs->getPrenoms());
        $this->assertEmpty($utilisateurs->getPhoto());
        $this->assertEmpty($utilisateurs->getLogin());
        $this->assertEmpty($utilisateurs->getAdresse());
        $this->assertEmpty($utilisateurs->getEmail());
        $this->assertEmpty($utilisateurs->getDateNaissance());
    }
}
