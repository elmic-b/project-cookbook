<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipeAllergen
 *
 * @ORM\Table(name="recipe_allergen", indexes={@ORM\Index(name="fk_recipe_all", columns={"fk_recipe_all"}), @ORM\Index(name="fk_allergen_rec", columns={"fk_allergen_rec"})})
 * @ORM\Entity(repositoryClass="App\Repository\RecipeAllergenRepository")
 */
class RecipeAllergen
{
    /**
     * @var int
     *
     * @ORM\Column(name="rec_all_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recAllId;

    /**
     * @var \Allergen
     *
     * @ORM\ManyToOne(targetEntity="Allergen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_allergen_rec", referencedColumnName="allergen_id")
     * })
     */
    private $fkAllergenRec;

    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_recipe_all", referencedColumnName="recipe_id")
     * })
     */
    private $fkRecipeAll;

    public function getRecAllId(): ?int
    {
        return $this->recAllId;
    }

    public function getFkAllergenRec(): ?Allergen
    {
        return $this->fkAllergenRec;
    }

    public function setFkAllergenRec(?Allergen $fkAllergenRec): self
    {
        $this->fkAllergenRec = $fkAllergenRec;

        return $this;
    }

    public function getFkRecipeAll(): ?Recipe
    {
        return $this->fkRecipeAll;
    }

    public function setFkRecipeAll(?Recipe $fkRecipeAll): self
    {
        $this->fkRecipeAll = $fkRecipeAll;

        return $this;
    }


}
