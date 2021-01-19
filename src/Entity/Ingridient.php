<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingridient
 *
 * @ORM\Table(name="ingridient")
 * @ORM\Entity(repositoryClass="App\Repository\IngridientRepository")
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


}
