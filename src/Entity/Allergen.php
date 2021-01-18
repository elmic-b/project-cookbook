<?php

namespace App\Entity;

use App\Repository\AllergenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AllergenRepository::class)
 */
class Allergen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $allergen_id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $abbr;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllergenId(): ?int
    {
        return $this->allergen_id;
    }

    public function setAllergenId(int $allergen_id): self
    {
        $this->allergen_id = $allergen_id;

        return $this;
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
