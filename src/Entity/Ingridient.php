<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingridient
 *
 * @ORM\Table(name="ingridient", indexes={@ORM\Index(name="fk_heading_i", columns={"fk_head"})})
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
     * @var \HeadingIng
     *
     * @ORM\ManyToOne(targetEntity="HeadingIng")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_head", referencedColumnName="heading_ing_id")
     * })
     */
    private $fkHead;

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

    public function getFkHead(): ?HeadingIng
    {
        return $this->fkHead;
    }

    public function setFkHead(?HeadingIng $fkHead): self
    {
        $this->fkHead = $fkHead;

        return $this;
    }


}
