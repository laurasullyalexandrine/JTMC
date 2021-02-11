<?php

namespace App\Repository;

use App\Entity\InformationPayment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformationPayment|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationPayment|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationPayment[]    findAll()
 * @method InformationPayment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationPaymentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationPayment::class);
    }

    // /**
    //  * @return InformationPayment[] Returns an array of InformationPayment objects
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
    public function findOneBySomeField($value): ?InformationPayment
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
