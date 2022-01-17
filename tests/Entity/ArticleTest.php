<?php

use App\Entity\Article;
namespace App\Tests\Entity;

use App\Entity\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testValide(): void
    {
        $article = New Article();
        $article
            ->setTitre("Toto")
            ->setContenu("Fab")
            ->setResume("Toto en vacance")
            ->setStatut("Publier")
            ;
        $this->assertTrue($article->getTitre() === "Toto");
        $this->assertTrue($article->getContenu() === "Fab");
        $this->assertTrue($article->getResume() === "Toto en vacance");
        $this->assertTrue($article->getStatut() === "Publier");

    }

    public function testNonValide(): void
    {
        $article = new Article();
        $article
            ->setTitre("Valdo")
            ->setContenu("Fab")
            ->setResume("Trop à faire")
            ->setStatut("Publier")
            ;
        // $this->assertFalse(false);
        $this->assertFalse($article->getTitre() !== "Valdo");
        $this->assertFalse($article->getContenu() !== "Fab");
        $this->assertFalse($article->getResume() !== "Trop à faire");
        $this->assertFalse($article->getStatut() !== "Publier");
    }

    public function testVide(): void
    {
        $article = new Article();
        // $this->assertEmpty(empty);
        $this->assertEmpty($article->getTitre());
        $this->assertEmpty($article->getContenu());
        $this->assertEmpty($article->getResume());
        $this->assertEmpty($article->getStatut());
    }
}
