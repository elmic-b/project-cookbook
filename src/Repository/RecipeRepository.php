<?php

namespace App\Repository;

use App\Entity\Allergen;
use App\Entity\Cooking;
use App\Entity\Ingridient;
use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipe[]    findAll()
 * @method Recipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }


    /**
     * @param string|null $term
     * @return Recipe[]
     */
    public function findAllWithSearch(?string $term)
    {
        $qb = $this->createQueryBuilder('r');
        if ($term) {
            $qb->andWhere('r.name LIKE :term')
                ->setParameter('term', '%' . $term . '%');
        }
        return $qb
            ->orderBy('r.name', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string|null $difficulty string|null $nutrition string|null $category
     * @return Recipe[]
     */
    public function filterFunction(?string $difficulty, ?string $nutrition, ?string $category)
    {
        $entityManager = $this->getEntityManager();

        $query = "";

        if ($difficulty != "") {
            if ($nutrition != "") {
                if ($category != "") {
                    $query = $entityManager->createQuery(
                        'SELECT  r, n, d, c
                                FROM App\Entity\Recipe r
                                INNER JOIN r.fkNutritionForm n 
                                INNER JOIN r.fkDifficulty d
                                INNER JOIN r.fkCategory c 
                                WHERE d.difficulty LIKE :difficulty 
                                AND n.nutrition LIKE :nutrition
                                AND c.category LIKE :category'
                    )->setParameter('difficulty', $difficulty)
                        ->setParameter('nutrition', $nutrition)
                        ->setParameter('category', $category);
                } else {
                    $query = $entityManager->createQuery(
                        'SELECT  r, n, d
                                FROM App\Entity\Recipe r
                                INNER JOIN r.fkNutritionForm n 
                                INNER JOIN r.fkDifficulty d
                                WHERE d.difficulty LIKE :difficulty 
                                AND n.nutrition LIKE :nutrition'
                    )->setParameter('difficulty', $difficulty)
                        ->setParameter('nutrition', $nutrition);
                }
            } else {
                if ($category != "") {
                    $query = $entityManager->createQuery(
                        'SELECT  r, d, c
                                FROM App\Entity\Recipe r
                                INNER JOIN r.fkDifficulty d
                                INNER JOIN r.fkCategory c 
                                WHERE d.difficulty LIKE :difficulty 
                                AND c.category LIKE :category'
                    )->setParameter('difficulty', $difficulty)
                        ->setParameter('category', $category);
                } else {
                    $query = $entityManager->createQuery(
                        'SELECT  r, d
            FROM App\Entity\Recipe r
            INNER JOIN r.fkDifficulty d WHERE d.difficulty LIKE :difficulty'
                    )->setParameter('difficulty', $difficulty);
                }
            }

        } else if ($nutrition != "") {
            if ($category != "") {
                $query = $entityManager->createQuery(
                    'SELECT  r, n, c
                                FROM App\Entity\Recipe r
                                INNER JOIN r.fkNutritionForm n 
                                INNER JOIN r.fkCategory c 
                                WHERE n.nutrition LIKE :nutrition
                                AND c.category LIKE :category'
                )->setParameter('nutrition', $nutrition)
                    ->setParameter('category', $category);
            } else {
                $query = $entityManager->createQuery(
                    'SELECT  r, n
            FROM App\Entity\Recipe r
            INNER JOIN r.fkNutritionForm n WHERE n.nutrition LIKE :nutrition'
                )->setParameter('nutrition', $nutrition);
            }

        } else if ($category != "") {
            $query = $entityManager->createQuery(
                'SELECT  r, c
            FROM App\Entity\Recipe r
            INNER JOIN r.fkCategory c WHERE c.category LIKE :category'
            )->setParameter('category', $category);
        } else {
            $query = $entityManager->createQuery(
                'SELECT  r
            FROM App\Entity\Recipe r'
            );
        }

        return $query->getResult();
    }



    // /**
    //  * @return Recipe[] Returns an array of Recipe objects
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
    public function findOneBySomeField($value): ?Recipe
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /*
    /**
     * @return Product[]
     */
    /*
    public function findAllGreaterThanPrice(int $price): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Product p
            WHERE p.price > :price
            ORDER BY p.price ASC'
        )->setParameter('price', $price);

        // returns an array of Product objects
        return $query->getResult();


       $qb = $this->createQueryBuilder('p')
            ->where('p.price > :price')
            ->setParameter('price', $price)
            ->orderBy('p.price', 'ASC');

        if (!$includeUnavailableProducts) {
            $qb->andWhere('p.available = TRUE');
        }

        $query = $qb->getQuery();

        return $query->execute();


    }
    */
}
