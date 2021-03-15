<?php

namespace App\Repository;

use App\Entity\ConcertProf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConcertProf|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConcertProf|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConcertProf[]    findAll()
 * @method ConcertProf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcertProfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConcertProf::class);
    }

    // /**
    //  * @return ConcertProf[] Returns an array of ConcertProf objects
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
    public function findOneBySomeField($value): ?ConcertProf
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
