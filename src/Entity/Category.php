<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="Category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $categoryId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="category", type="string", length=30, nullable=true)
     */
    private $category;

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }


}
