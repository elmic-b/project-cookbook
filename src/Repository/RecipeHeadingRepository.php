<?php

namespace App\Repository;

use App\Entity\RecipeHeading;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecipeHeading|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeHeading|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeHeading[]    findAll()
 * @method RecipeHeading[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeHeadingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeHeading::class);
    }

    // /**
    //  * @return RecipeHeading[] Returns an array of RecipeHeading objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecipeHeading
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
