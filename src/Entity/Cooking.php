<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cooking
 *
 * @ORM\Table(name="cooking", indexes={@ORM\Index(name="fk_cooking_rec", columns={"fk_recipe"})})
 * @ORM\Entity(repositoryClass="App\Repository\CookingRepository")
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
     * @ORM\Column(name="cooking", type="string", length=550, nullable=true)
     */
    private $cooking;

    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_recipe", referencedColumnName="recipe_id")
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

    public function setHeading(?string $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    public function getCooking(): ?string
    {
        return $this->cooking;
    }

    public function setCooking(?string $cooking): self
    {
        $this->cooking = $cooking;

        return $this;
    }

    public function getFkRecipe(): ?Recipe
    {
        return $this->fkRecipe;
    }

    public function setFkRecipe(?Recipe $fkRecipe): self
    {
        $this->fkRecipe = $fkRecipe;

        return $this;
    }


}
