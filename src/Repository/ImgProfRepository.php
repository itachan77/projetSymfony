<?php

namespace App\Repository;

use App\Entity\ImgProf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImgProf|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImgProf|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImgProf[]    findAll()
 * @method ImgProf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImgProfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImgProf::class);
    }

    // /**
    //  * @return ImgProf[] Returns an array of ImgProf objects
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
    public function findOneBySomeField($value): ?ImgProf
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
