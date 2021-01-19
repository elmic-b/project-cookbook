<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipeHeading
 *
 * @ORM\Table(name="recipe_heading", indexes={@ORM\Index(name="fk_recipe_hea", columns={"fk_recipe_hea"}), @ORM\Index(name="fk_heading_rec", columns={"fk_heading_rec"})})
 * @ORM\Entity(repositoryClass="App\Repository\RecipeHeadingRepository")
 */
class RecipeHeading
{
    /**
     * @var int
     *
     * @ORM\Column(name="rec_hea_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recHeaId;

    /**
     * @var \HeadingIng
     *
     * @ORM\ManyToOne(targetEntity="HeadingIng")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_heading_rec", referencedColumnName="heading_ing_id")
     * })
     */
    private $fkHeadingRec;

    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_recipe_hea", referencedColumnName="recipe_id")
     * })
     */
    private $fkRecipeHea;

    public function getRecHeaId(): ?int
    {
        return $this->recHeaId;
    }

    public function getFkHeadingRec(): ?HeadingIng
    {
        return $this->fkHeadingRec;
    }

    public function setFkHeadingRec(?HeadingIng $fkHeadingRec): self
    {
        $this->fkHeadingRec = $fkHeadingRec;

        return $this;
    }

    public function getFkRecipeHea(): ?Recipe
    {
        return $this->fkRecipeHea;
    }

    public function setFkRecipeHea(?Recipe $fkRecipeHea): self
    {
        $this->fkRecipeHea = $fkRecipeHea;

        return $this;
    }


}
