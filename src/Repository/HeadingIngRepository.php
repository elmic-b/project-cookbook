<?php

namespace App\Repository;

use App\Entity\HeadingIng;
use App\Entity\Ingridient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HeadingIng|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeadingIng|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeadingIng[]    findAll()
 * @method HeadingIng[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeadingIngRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeadingIng::class);
    }

    public function findByIdJoinedToIngridient(int $recipeId)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT  i.name, i.portion
            FROM App\Entity\HeadingIng h
            INNER JOIN h.fkRecipe r
            INNER JOIN h.ingridient i
            WHERE r.recipeId = :id'
        )->setParameter('id', $recipeId);

        return $query->getResult();
    }

    // /**
    //  * @return HeadingIng[] Returns an array of HeadingIng objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HeadingIng
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
