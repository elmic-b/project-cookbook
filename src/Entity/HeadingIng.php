<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HeadingIng
 *
 * @ORM\Table(name="heading_ing")
 * @ORM\Entity(repositoryClass="App\Repository\HeadingIngRepository")
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


}
