<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NutritionForm
 *
 * @ORM\Table(name="Nutrition_form")
 * @ORM\Entity
 */
class NutritionForm
{
    /**
     * @var int
     *
     * @ORM\Column(name="nutrition_form_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nutritionFormId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nutrition", type="string", length=30, nullable=true)
     */
    private $nutrition;

    public function getNutritionFormId(): ?int
    {
        return $this->nutritionFormId;
    }

    public function getNutrition(): ?string
    {
        return $this->nutrition;
    }

    public function setNutrition(?string $nutrition): self
    {
        $this->nutrition = $nutrition;

        return $this;
    }


}
