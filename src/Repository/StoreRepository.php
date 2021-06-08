<?php

namespace App\Repository;

use App\Entity\Store;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Store|null find($id, $lockMode = null, $lockVersion = null)
 * @method Store|null findOneBy(array $criteria, array $orderBy = null)
 * @method Store[]    findAll()
 * @method Store[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Store::class);
    }

   // create a custom function for active activity filters
    // public function findByInformation($session)
    // {
    //     $citySearch = $session->get('search-city');
    //     $activity = $session->get('activity');
    //     $service = $session->get('service');
    //     $day = $session->get('day');

    //     $qb = $this->createQueryBuilder('s');

    //     $qb->join('s.commercialService', 'cs');
    //     $qb->join('s.openDays', 'o');

    //     $qb->addSelect('cs');
    //     $qb->addSelect('o');


    //     if($activity !== null)
    //     {
    //         $qb->andWhere("s.storeActivity = :activity")
    //             ->setParameter('activity', $activity);
    //     }

    //     if($citySearch !== null)
    //     {
    //         $qb->andWhere("s.city = :citySearch")
    //             ->orWhere("s.postalCode = :citySearch")
    //             ->setParameter('citySearch', $citySearch);
    //     }

    //     if($day !== null)
    //     {
    //         $qb->where("o.days = :day")
    //         ->setParameter('day', $day);
    //     }

    //     if($service !== null)
    //     {
    //         $qb->andWhere("cs.serviceTypes = :service")
    //             ->setParameter('service', $service);
    //     }

    //     return  $qb->getQuery()->getResult();
    // }
   
    /*
    public function findOneBySomeField($value): ?Store
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
