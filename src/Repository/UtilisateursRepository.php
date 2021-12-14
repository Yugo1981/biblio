<?php

namespace App\Repository;

use App\Entity\Utilisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Utilisateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateurs[]    findAll()
 * @method Utilisateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateurs::class);
    }

    public function findByUtilisateursCivilite()
    {
        $qb = $this->createQueryBuilder('u');
        $qb
             ->select('u')
             ->where('u.civilite =:civilite ')
             ->setParameter('civilite' , 'Monsieur')
             ->orderBy('u.noms' , 'ASC');
        
        return $qb->getQuery()->getResult();
    }

    public function findByStatut()
    {
        $qb = $this->createQueryBuilder('u');
        $qb
             ->select('u')
             ->where('u.statut =:statut ')
             ->setParameter('statut' , 'Publier')
             ->orderBy('u.noms' , 'ASC');
        
        return $qb->getQuery()->getResult();
    }

    public function findStatutNom()
    {
         // Statut d'un utilisateur et par nom de famille
         $qb = $this->createQueryBuilder('u');
         $qb
             ->select('u')
             // ->select(champ que l'on veut)
             ->where('u.noms')
             ->setParameter('noms' , 'Follereau')
             ->andWhere('u.civilite =:civilite')
             ->setParameter('civilite' , 'Monsieur')
             // ->setMaxResults(5)
             ->orderBy('u.noms' , 'DESC');
         
         return $qb->getQuery()->getResult();
    }



    // /**
    //  * @return Utilisateurs[] Returns an array of Utilisateurs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utilisateurs
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
