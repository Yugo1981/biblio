<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findByArticleStatut()
    {
        $qb = $this->createQueryBuilder('a');
        $qb
             ->select('a')
             ->where('a.statut =:statut ')
             ->setParameter('statut' , 'Publier')
             ->orderBy('a.auteur' , 'ASC');
        
        return $qb->getQuery()->getResult();

    }

    public function findArticlePourUnAuteur()
    {
        // Articles d'un auteur + toutes publiées
        $qb = $this->createQueryBuilder('a');
        $qb
            ->innerJoin('App\Entity\Auteur' , 'o' , 'WITH' , 'o=a.auteur')
            // ->select(champ que l'on veut)
            ->where('o.noms like :noms')
            ->setParameter('noms' , 'Vaillant')
            ->andWhere('a.statut =:statut')
            ->setParameter('statut' , 'Publier')
            // ->setMaxResults(5)
            ->orderBy('a.titre' , 'DESC');
        
        return $qb->getQuery()->getResult();

    }

    public function findByArticlePourUneCategorie()
    {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->innerJoin(('App\Entity\Categorie') , 'o' , 'WITH' , 'o=a.categorie')
            ->where('o.titre like :titre')
            ->setParameter('titre' , 'Sport');

        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
