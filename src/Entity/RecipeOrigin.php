<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipeOrigin
 *
 * @ORM\Table(name="recipe_origin", indexes={@ORM\Index(name="fk_recipe_ori", columns={"fk_recipe_ori"}), @ORM\Index(name="fk_origin_rec", columns={"fk_origin_rec"})})
 * @ORM\Entity(repositoryClass="App\Repository\RecipeOriginRepository")
 */
class RecipeOrigin
{
    /**
     * @var int
     *
     * @ORM\Column(name="rec_ori_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recOriId;

    /**
     * @var \Origin
     *
     * @ORM\ManyToOne(targetEntity="Origin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_origin_rec", referencedColumnName="origin_id")
     * })
     */
    private $fkOriginRec;

    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_recipe_ori", referencedColumnName="recipe_id")
     * })
     */
    private $fkRecipeOri;

    public function getRecOriId(): ?int
    {
        return $this->recOriId;
    }

    public function getFkOriginRec(): ?Origin
    {
        return $this->fkOriginRec;
    }

    public function setFkOriginRec(?Origin $fkOriginRec): self
    {
        $this->fkOriginRec = $fkOriginRec;

        return $this;
    }

    public function getFkRecipeOri(): ?Recipe
    {
        return $this->fkRecipeOri;
    }

    public function setFkRecipeOri(?Recipe $fkRecipeOri): self
    {
        $this->fkRecipeOri = $fkRecipeOri;

        return $this;
    }


}
