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

    public function findByService($session, $service = null)
    {
        $service = $session->get('service');
        $qb = $this->createQueryBuilder('c');

        if($service !== null)
        {
            $qb->leftJoin("c.stores", "s");
            $qb->andWhere("s.id = :id")
                ->setParameter("id", $service);
        }
        return  $qb->getQuery()->getResult();
        dump($qb);
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
}
