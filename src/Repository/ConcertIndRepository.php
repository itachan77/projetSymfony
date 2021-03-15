<?php

namespace App\Repository;

use App\Entity\ConcertInd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConcertInd|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConcertInd|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConcertInd[]    findAll()
 * @method ConcertInd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcertIndRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConcertInd::class);
    }

    // /**
    //  * @return ConcertInd[] Returns an array of ConcertInd objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConcertInd
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
