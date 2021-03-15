<?php

namespace App\Repository;

use App\Entity\ImgCi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImgCi|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImgCi|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImgCi[]    findAll()
 * @method ImgCi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImgCiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImgCi::class);
    }

    // /**
    //  * @return ImgCi[] Returns an array of ImgCi objects
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
    public function findOneBySomeField($value): ?ImgCi
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
