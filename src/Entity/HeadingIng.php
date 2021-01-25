<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HeadingIng
 *
 * @ORM\Table(name="heading_ing", indexes={@ORM\Index(name="fk_recipe_h", columns={"fk_recipe"})})
 * @ORM\Entity
 */
class HeadingIng
{
    /**
     * @var int
     *
     * @ORM\Column(name="heading_ing_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $headingIngId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=true)
     */
    private $name;

    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_recipe", referencedColumnName="recipe_id")
     * })
     */
    private $fkRecipe;

    public function getHeadingIngId(): ?int
    {
        return $this->headingIngId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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
