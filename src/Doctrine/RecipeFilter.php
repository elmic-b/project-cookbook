<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 09.03.2021
 * Time: 15:42
 */

namespace App\Doctrine;


use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;
class RecipeFilter extends SQLFilter
{


    /**
     * Gets the SQL query part to add to a query.
     *
     * @param ClassMetaData $targetEntity
     * @param string $targetTableAlias
     *
     * @return string The constraint SQL if there is available, empty string otherwise.
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if ($targetEntity->getReflectionClass()->name != 'App\Entity\Category') {
           var_dump($targetEntity);
            return '';

        }
        var_dump('yes');
        return sprintf('category like category');
    }

}