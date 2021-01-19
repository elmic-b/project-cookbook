<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recipe
 *
 * @ORM\Table(name="recipe", indexes={@ORM\Index(name="fk_difficulty", columns={"fk_difficulty"}), @ORM\Index(name="fk_tip", columns={"fk_tip"}), @ORM\Index(name="fk_nutrition_form", columns={"fk_nutrition_form"}), @ORM\Index(name="fk_category", columns={"fk_category"})})
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 */
class Recipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="recipe_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recipeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portions", type="string", length=40, nullable=true)
     */
    private $portions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cooking_time", type="string", length=30, nullable=true)
     */
    private $cookingTime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="audio_link", type="string", length=100, nullable=true)
     */
    private $audioLink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_link", type="string", length=100, nullable=true)
     */
    private $imageLink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="download_link", type="string", length=100, nullable=true)
     */
    private $downloadLink;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_category", referencedColumnName="category_id")
     * })
     */
    private $fkCategory;

    /**
     * @var \Difficulty
     *
     * @ORM\ManyToOne(targetEntity="Difficulty")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_difficulty", referencedColumnName="difficulty_id")
     * })
     */
    private $fkDifficulty;

    /**
     * @var \NutritionForm
     *
     * @ORM\ManyToOne(targetEntity="NutritionForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_nutrition_form", referencedColumnName="nutrition_form_id")
     * })
     */
    private $fkNutritionForm;

    /**
     * @var \Tip
     *
     * @ORM\ManyToOne(targetEntity="Tip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_tip", referencedColumnName="tip_id")
     * })
     */
    private $fkTip;

    public function getRecipeId(): ?int
    {
        return $this->recipeId;
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

    public function getPortions(): ?string
    {
        return $this->portions;
    }

    public function setPortions(?string $portions): self
    {
        $this->portions = $portions;

        return $this;
    }

    public function getCookingTime(): ?string
    {
        return $this->cookingTime;
    }

    public function setCookingTime(?string $cookingTime): self
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getAudioLink(): ?string
    {
        return $this->audioLink;
    }

    public function setAudioLink(?string $audioLink): self
    {
        $this->audioLink = $audioLink;

        return $this;
    }

    public function getImageLink(): ?string
    {
        return $this->imageLink;
    }

    public function setImageLink(?string $imageLink): self
    {
        $this->imageLink = $imageLink;

        return $this;
    }

    public function getDownloadLink(): ?string
    {
        return $this->downloadLink;
    }

    public function setDownloadLink(?string $downloadLink): self
    {
        $this->downloadLink = $downloadLink;

        return $this;
    }

    public function getFkCategory(): ?Category
    {
        return $this->fkCategory;
    }

    public function setFkCategory(?Category $fkCategory): self
    {
        $this->fkCategory = $fkCategory;

        return $this;
    }

    public function getFkDifficulty(): ?Difficulty
    {
        return $this->fkDifficulty;
    }

    public function setFkDifficulty(?Difficulty $fkDifficulty): self
    {
        $this->fkDifficulty = $fkDifficulty;

        return $this;
    }

    public function getFkNutritionForm(): ?NutritionForm
    {
        return $this->fkNutritionForm;
    }

    public function setFkNutritionForm(?NutritionForm $fkNutritionForm): self
    {
        $this->fkNutritionForm = $fkNutritionForm;

        return $this;
    }

    public function getFkTip(): ?Tip
    {
        return $this->fkTip;
    }

    public function setFkTip(?Tip $fkTip): self
    {
        $this->fkTip = $fkTip;

        return $this;
    }


}
