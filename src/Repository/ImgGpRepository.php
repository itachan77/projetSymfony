<?php

namespace App\Repository;

use App\Entity\ImgGp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImgGp|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImgGp|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImgGp[]    findAll()
 * @method ImgGp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImgGpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImgGp::class);
    }

    // /**
    //  * @return ImgGp[] Returns an array of ImgGp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImgGp
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
