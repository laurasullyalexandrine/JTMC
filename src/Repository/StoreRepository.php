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

   
    public function findByFilter($session)
    {
        $cityZip = $session->get('zip-city');
        $filter = $session->get('filter');
        $qb = $this->createQueryBuilder('s');
        if($filter !== null){
            $qb->andWhere("s.storeActivity = :filter")
            ->setParameter('filter', $filter);
        }
        if($cityZip !== null){
            $qb->andWhere("s.city = :cityZip")
            ->orWhere("s.postalCode = :cityZip ")
            ->setParameter('cityZip', $cityZip);
        } 
          return  $qb->getQuery()
            ->getResult()
        ;
    }
  

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
