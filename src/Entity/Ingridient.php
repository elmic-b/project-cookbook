<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ingridient
 *
 * @ORM\Table(name="ingridient")
 * @ORM\Entity
 */
class Ingridient
{
    /**
     * @var int
     *
     * @ORM\Column(name="ingridient_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ingridientId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portion", type="string", length=50, nullable=true)
     */
    private $portion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Recipe", mappedBy="ingridient")
     */
    private $recipe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recipe = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIngridientId(): ?int
    {
        return $this->ingridientId;
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

    public function getPortion(): ?string
    {
        return $this->portion;
    }

    public function setPortion(?string $portion): self
    {
        $this->portion = $portion;

        return $this;
    }

    /**
     * @return Collection|Recipe[]
     */
    public function getRecipe(): Collection
    {
        return $this->recipe;
    }

    public function addRecipe(Recipe $recipe): self
    {
        if (!$this->recipe->contains($recipe)) {
            $this->recipe[] = $recipe;
            $recipe->addIngridient($this);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): self
    {
        if ($this->recipe->removeElement($recipe)) {
            $recipe->removeIngridient($this);
        }

        return $this;
    }

}
