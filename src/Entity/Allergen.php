<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Allergen
 *
 * @ORM\Table(name="allergen")
 * @ORM\Entity(repositoryClass="App\Repository\AllergenRepository")
 */
class Allergen
{
    /**
     * @var int
     *
     * @ORM\Column(name="allergen_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $allergenId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbr", type="string", length=20, nullable=true)
     */
    private $abbr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=60, nullable=true)
     */
    private $name;

    public function getAllergenId(): ?int
    {
        return $this->allergenId;
    }

    public function getAbbr(): ?string
    {
        return $this->abbr;
    }

    public function setAbbr(?string $abbr): self
    {
        $this->abbr = $abbr;

        return $this;
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

    
}
