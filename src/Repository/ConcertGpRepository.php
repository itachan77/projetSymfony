<?php

namespace App\Repository;

use App\Entity\ConcertGp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConcertGp|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConcertGp|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConcertGp[]    findAll()
 * @method ConcertGp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcertGpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConcertGp::class);
    }

    // /**
    //  * @return ConcertGp[] Returns an array of ConcertGp objects
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
    public function findOneBySomeField($value): ?ConcertGp
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
