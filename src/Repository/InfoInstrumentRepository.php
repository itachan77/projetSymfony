<?php

namespace App\Repository;

use App\Entity\InfoInstrument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfoInstrument|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoInstrument|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoInstrument[]    findAll()
 * @method InfoInstrument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoInstrumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfoInstrument::class);
    }

    // /**
    //  * @return InfoInstrument[] Returns an array of InfoInstrument objects
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
    public function findOneBySomeField($value): ?InfoInstrument
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
