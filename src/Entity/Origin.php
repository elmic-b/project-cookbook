<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Origin
 *
 * @ORM\Table(name="origin")
 * @ORM\Entity(repositoryClass="App\Repository\OriginRepository")
 */
class Origin
{
    /**
     * @var int
     *
     * @ORM\Column(name="origin_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $originId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=true)
     */
    private $name;

    public function getOriginId(): ?int
    {
        return $this->originId;
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
