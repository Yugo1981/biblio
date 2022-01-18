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
                    ->setCivilite("Mr")
                    ->setStatut("Publier")
                    ->setPassword("Zou")
                    ;

        $this->assertTrue($utilisateurs->getNoms() === "Yugo");
        $this->assertTrue($utilisateurs->getPrenoms() === "Fab");
        $this->assertTrue($utilisateurs->getPhoto() === "1");
        $this->assertTrue($utilisateurs->getLogin() === "Fabrice");
        $this->assertTrue($utilisateurs->getAdresse() === "1 rue");
        $this->assertTrue($utilisateurs->getEmail() === "Valdo@toto.fr");
        $this->assertTrue($utilisateurs->getDateNaissance() === $date);
        $this->assertTrue($utilisateurs->getCivilite() === "Mr");
        $this->assertTrue($utilisateurs->getStatut() === "Publier");
        $this->assertTrue($utilisateurs->getPassword() === "Zou");

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
                ->setCivilite("Mr")
                ->setStatut("Publier")
                ->setPassword("Zou")
            ;
        // $this->assertTrue(true);
        $this->assertFalse($utilisateurs->getNoms() !== "Yugo");
        $this->assertFalse($utilisateurs->getPrenoms() !== "Fab");
        $this->assertFalse($utilisateurs->getPhoto() !== "1");
        $this->assertFalse($utilisateurs->getLogin() !== "Fabrice");
        $this->assertFalse($utilisateurs->getAdresse() !== "1 rue");
        $this->assertFalse($utilisateurs->getEmail() !== "Valdo@toto.fr");
        $this->assertFalse($utilisateurs->getDateNaissance() !== $date);
        $this->assertFalse($utilisateurs->getCivilite() !== "Mr");
        $this->assertFalse($utilisateurs->getStatut() !== "Publier");
        $this->assertFalse($utilisateurs->getPassword() !== "Zou");
    }

    public function testVide(): void
    {
        $date = new DateTime();
        $utilisateurs = new Utilisateurs();
        // $this->assertEmpty(empty);
        $this->assertEmpty($utilisateurs->getId());
        $this->assertEmpty($utilisateurs->getNoms());
        $this->assertEmpty($utilisateurs->getPrenoms());
        $this->assertEmpty($utilisateurs->getPhoto());
        $this->assertEmpty($utilisateurs->getLogin());
        $this->assertEmpty($utilisateurs->getAdresse());
        $this->assertEmpty($utilisateurs->getEmail());
        $this->assertEmpty($utilisateurs->getDateNaissance());
        $this->assertEmpty($utilisateurs->getCivilite());
        $this->assertEmpty($utilisateurs->getStatut());
        $this->assertEmpty($utilisateurs->getPassword());
    }
}
