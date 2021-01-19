<?php

namespace App\Repository;

use App\Entity\Cooking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cooking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cooking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cooking[]    findAll()
 * @method Cooking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cooking::class);
    }

    // /**
    //  * @return Cooking[] Returns an array of Cooking objects
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
    public function findOneBySomeField($value): ?Cooking
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
