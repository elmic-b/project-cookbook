<?php

namespace App\Repository;

use App\Entity\NutritionForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NutritionForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method NutritionForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method NutritionForm[]    findAll()
 * @method NutritionForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NutritionFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NutritionForm::class);
    }

    // /**
    //  * @return NutritionForm[] Returns an array of NutritionForm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NutritionForm
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
