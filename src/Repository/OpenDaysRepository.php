<?php

namespace App\Repository;

use App\Entity\OpenDays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OpenDays|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpenDays|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpenDays[]    findAll()
 * @method OpenDays[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpenDaysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpenDays::class);
    }

    // /**
    //  * @return OpenDays[] Returns an array of OpenDays objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OpenDays
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
