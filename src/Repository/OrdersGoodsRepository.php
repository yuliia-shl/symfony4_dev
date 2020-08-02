<?php

namespace App\Repository;

use App\Entity\OrdersGoods;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrdersGoods|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdersGoods|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdersGoods[]    findAll()
 * @method OrdersGoods[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdersGoodsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdersGoods::class);
    }

    // /**
    //  * @return OrdersGoods[] Returns an array of OrdersGoods objects
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
    public function findOneBySomeField($value): ?OrdersGoods
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
