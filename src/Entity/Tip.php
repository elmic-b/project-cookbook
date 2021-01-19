<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tip
 *
 * @ORM\Table(name="tip")
 * @ORM\Entity(repositoryClass="App\Repository\TipRepository")
 */
class Tip
{
    /**
     * @var int
     *
     * @ORM\Column(name="tip_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tipId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tip", type="string", length=150, nullable=true)
     */
    private $tip;

    public function getTipId(): ?int
    {
        return $this->tipId;
    }

    public function getTip(): ?string
    {
        return $this->tip;
    }

    public function setTip(?string $tip): self
    {
        $this->tip = $tip;

        return $this;
    }


}
