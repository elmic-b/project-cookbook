<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Difficulty
 *
 * @ORM\Table(name="Difficulty")
 * @ORM\Entity
 */
class Difficulty
{
    /**
     * @var int
     *
     * @ORM\Column(name="difficulty_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $difficultyId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="difficulty", type="string", length=30, nullable=true)
     */
    private $difficulty;

    public function getDifficultyId(): ?int
    {
        return $this->difficultyId;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(?string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }


}
