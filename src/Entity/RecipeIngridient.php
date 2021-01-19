<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipeIngridient
 *
 * @ORM\Table(name="recipe_ingridient", indexes={@ORM\Index(name="fk_recipe_ing", columns={"fk_recipe_ing"}), @ORM\Index(name="fk_ingridient_rec", columns={"fk_ingridient_rec"})})
 * @ORM\Entity(repositoryClass="App\Repository\RecipeIngridientRepository")
 */
class RecipeIngridient
{
    /**
     * @var int
     *
     * @ORM\Column(name="rec_ing_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recIngId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ingridient_portion", type="string", length=30, nullable=true)
     */
    private $ingridientPortion;

    /**
     * @var \Ingridient
     *
     * @ORM\ManyToOne(targetEntity="Ingridient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_ingridient_rec", referencedColumnName="ingridient_id")
     * })
     */
    private $fkIngridientRec;

    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_recipe_ing", referencedColumnName="recipe_id")
     * })
     */
    private $fkRecipeIng;

    public function getRecIngId(): ?int
    {
        return $this->recIngId;
    }

    public function getIngridientPortion(): ?string
    {
        return $this->ingridientPortion;
    }

    public function setIngridientPortion(?string $ingridientPortion): self
    {
        $this->ingridientPortion = $ingridientPortion;

        return $this;
    }

    public function getFkIngridientRec(): ?Ingridient
    {
        return $this->fkIngridientRec;
    }

    public function setFkIngridientRec(?Ingridient $fkIngridientRec): self
    {
        $this->fkIngridientRec = $fkIngridientRec;

        return $this;
    }

    public function getFkRecipeIng(): ?Recipe
    {
        return $this->fkRecipeIng;
    }

    public function setFkRecipeIng(?Recipe $fkRecipeIng): self
    {
        $this->fkRecipeIng = $fkRecipeIng;

        return $this;
    }


}
