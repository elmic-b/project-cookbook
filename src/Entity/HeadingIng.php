<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * HeadingIng
 *
 * @ORM\Table(name="Heading_ing", indexes={@ORM\Index(name="fk_recipe_h", columns={"fk_recipe"})})
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


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ingridient", mappedBy="fkHead")
     */
    private $ingridient;

    /**
     * @return Collection|Ingridient[]
     */
    public function getIngridient(): Collection
    {
        return $this->ingridient;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingridient = new ArrayCollection();
    }


    public function getHeadingIngId(): ?int
    {
        return $this->headingIngId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }


    public function getFkRecipe(): ?Recipe
    {
        return $this->fkRecipe;
    }




}
