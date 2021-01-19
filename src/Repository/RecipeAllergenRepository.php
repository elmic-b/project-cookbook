<?php

namespace App\Repository;

use App\Entity\RecipeAllergen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecipeAllergen|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeAllergen|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeAllergen[]    findAll()
 * @method RecipeAllergen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeAllergenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeAllergen::class);
    }

    // /**
    //  * @return RecipeAllergen[] Returns an array of RecipeAllergen objects
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
    public function findOneBySomeField($value): ?RecipeAllergen
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
