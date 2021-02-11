<?php

namespace App\Repository;

use App\Entity\CommercialService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommercialService|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommercialService|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommercialService[]    findAll()
 * @method CommercialService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommercialServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommercialService::class);
    }

    // /**
    //  * @return CommercialService[] Returns an array of CommercialService objects
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
    public function findOneBySomeField($value): ?CommercialService
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
