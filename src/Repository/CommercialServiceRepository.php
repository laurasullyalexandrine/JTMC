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
    public function findByService($session)
    {
        $citySearch = $session->get('search-city');
        $service = $session->get('service');
        $qb = $this->createQueryBuilder('c')

        if(service !== null){
            $qb->andWhere("c.commercialService = :service")
            ->setParameter('service', $service);
        }
        if($citySearch !== null){
            $qb->andWhere("")
        }
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

// create a custom function for active activity filters
    public function findStoreByInformation($session)
    {
        $service = $session->get('service');
        $activity = $session->get('activity');
        $citySearch = $session->get('search-city');
        $qb = $this->createQueryBuilder('c');
        $qb->addSelect('s');
        $qb->leftJoin('c.stores', 's');

        if($service !== null)
        {
            $qb->andWhere("c.serviceTypes = :service")
                ->setParameter('service', $service);
        }

        if($activity !== null)
        {
            $qb->andWhere("s.storeActivity = :activity")
                ->setParameter('activity', $activity);
        }

        if($citySearch !== null)
        {
            $qb->andWhere("s.city = :citySearch")
                ->orWhere("s.postalCode = :citySearch")
                ->setParameter('citySearch', $citySearch);
        }

        return  $qb->getQuery()->getResult();
    }
}
