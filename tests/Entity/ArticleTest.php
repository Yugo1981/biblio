<?php

use App\Entity\Article;
namespace App\Tests\Entity;

use App\Entity\Article;
use App\Entity\Auteur;
use App\Entity\Categorie;
use DateTime;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testValide(): void
    {
        $auteur = new Auteur;
        $categorie = new Categorie;
        $date = new DateTime();
        $article = New Article();
        $article
            ->setTitre("Toto")
            ->setContenu("Fab")
            ->setResume("Toto en vacance")
            ->setStatut("Publier")
            ->setSlug("Slug")
            ->setCategorie($categorie)
            ->setAuteur($auteur)
            ->setUpdatedAt($date)
            ;
        $this->assertTrue($article->getTitre() === "Toto");
        $this->assertTrue($article->getContenu() === "Fab");
        $this->assertTrue($article->getResume() === "Toto en vacance");
        $this->assertTrue($article->getStatut() === "Publier");
        $this->assertTrue($article->getSlug() === "Slug");
        $this->assertTrue($article->getCategorie() === $categorie);
        $this->assertTrue($article->getAuteur() === $auteur);
        $this->assertTrue($article->getUpdatedAt() === $date);



    }

    public function testNonValide(): void
    {
        $auteur = new Auteur;
        $categorie = new Categorie;
        $date = new DateTime();
        $article = new Article();
        $article
            ->setTitre("Valdo")
            ->setContenu("Fab")
            ->setResume("Trop à faire")
            ->setStatut("Publier")
            ->setSlug("Slug")
            ->setCategorie($categorie)
            ->setAuteur($auteur)
            ->setUpdatedAt($date)
            ;
        // $this->assertFalse(false);
        $this->assertFalse($article->getTitre() !== "Valdo");
        $this->assertFalse($article->getContenu() !== "Fab");
        $this->assertFalse($article->getResume() !== "Trop à faire");
        $this->assertFalse($article->getStatut() !== "Publier");
        $this->assertFalse($article->getSlug() !== "Slug");
        $this->assertFalse($article->getCategorie() !== $categorie);
        $this->assertFalse($article->getAuteur() !== $auteur);
        $this->assertFalse($article->getUpdatedAt() !== $date);
    }

    public function testVide(): void
    {
        $article = new Article();
        // $this->assertEmpty(empty);
        $this->assertEmpty($article->getId());
        $this->assertEmpty($article->getTitre());
        $this->assertEmpty($article->getContenu());
        $this->assertEmpty($article->getResume());
        $this->assertEmpty($article->getStatut());
        $this->assertEmpty($article->getSlug());
        $this->assertEmpty($article->getCategorie());
        $this->assertEmpty($article->getAuteur());
        $this->assertEmpty($article->getUpdatedAt());
    }
}
