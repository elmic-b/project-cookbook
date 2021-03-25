<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cooking
 *
 * @ORM\Table(name="Cooking",
 *     indexes={@ORM\Index(name="IDX_467BE66A38817584", columns={"fk_recipe_id"})})
 * @ORM\Entity
 */
class Cooking
{
    /**
     * @var int
     *
     * @ORM\Column(name="cooking_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cookingId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="heading", type="string", length=50, nullable=true)
     */
    private $heading;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cooking", type="string", length=650, nullable=true)
     */
    private $cooking;


    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipe", inversedBy="cooking_id")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_recipe_id", referencedColumnName="recipe_id")
     * })
     */
    private $fkRecipe;



    public function getCookingId(): ?int
    {
        return $this->cookingId;
    }

    public function getHeading(): ?string
    {
        return $this->heading;
    }


    public function getCooking(): ?string
    {
        return $this->cooking;
    }


    public function getFkRecipe(): ?Recipe
    {
        return $this->fkRecipe;
    }




}
