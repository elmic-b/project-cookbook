<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Recipe
 *
 * @ORM\Table(name="Recipe",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_DA88B13767C22F66", columns={"fk_tip_id"})},
 *     indexes={@ORM\Index(name="IDX_DA88B137686514D7", columns={"fk_nutrition_form_id"}),
 *     @ORM\Index(name="IDX_DA88B1377BB031D6", columns={"fk_category_id"}),
 *     @ORM\Index(name="IDX_DA88B13798B0E86C", columns={"fk_difficulty_id"})})
 * @ORM\Entity
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
     * @ORM\Column(name="allergen_abbr", type="string", length=50, nullable=true)
     */
    private $allergenAbbr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="allergene", type="string", length=30, nullable=true)
     */
    private $allergene;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cooking_time", type="string", length=30, nullable=true)
     */
    private $cookingTime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img_alt", type="string", length=100, nullable=true)
     */
    private $imgAlt;

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
     * @var \Tip
     *
     * @ORM\ManyToOne(targetEntity="Tip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_tip_id", referencedColumnName="tip_id")
     * })
     */
    private $fkTip;

    /**
     * @var \NutritionForm
     *
     * @ORM\ManyToOne(targetEntity="NutritionForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_nutrition_form_id", referencedColumnName="nutrition_form_id")
     * })
     */
    private $fkNutritionForm;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_category_id", referencedColumnName="category_id")
     * })
     */
    private $fkCategory;

    /**
     * @var \Difficulty
     *
     * @ORM\ManyToOne(targetEntity="Difficulty")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_difficulty_id", referencedColumnName="difficulty_id")
     * })
     */
    private $fkDifficulty;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Allergen", inversedBy="recipe")
     * @ORM\JoinTable(name="recipe_allergen",
     *   joinColumns={
     *     @ORM\JoinColumn(name="recipe_id", referencedColumnName="recipe_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="allergen_id", referencedColumnName="allergen_id")
     *   }
     * )
     */
    private $allergen;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Origin", inversedBy="recipe")
     * @ORM\JoinTable(name="recipe_origin",
     *   joinColumns={
     *     @ORM\JoinColumn(name="recipe_id", referencedColumnName="recipe_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="origin_id", referencedColumnName="origin_id")
     *   }
     * )
     */
    private $origin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cooking", mappedBy="fkRecipe")
     */
    private $cooking;

    /**
     * @return Collection|Cooking[]
     */
    public function getCooking(): Collection
    {
        return $this->cooking;
    }


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HeadingIng", mappedBy="fkRecipe")
     */
    private $headingIng;

    /**
     * @return Collection|HeadingIng[]
     */
    public function getHeadingIng(): Collection
    {
        return $this->headingIng;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cooking = new ArrayCollection();
        $this->headingIng = new ArrayCollection();
        $this->allergen = new ArrayCollection();
        $this->origin = new ArrayCollection();
    }

    public function getRecipeId(): ?int
    {
        return $this->recipeId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPortions(): ?string
    {
        return $this->portions;
    }


    public function getAllergenAbbr(): ?string
    {
        return $this->allergenAbbr;
    }


    public function getAllergene(): ?string
    {
        return $this->allergene;
    }

    public function getCookingTime(): ?string
    {
        return $this->cookingTime;
    }

    public function getImgAlt(): ?string
    {
        return $this->imgAlt;
    }


    public function getAudioLink(): ?string
    {
        return $this->audioLink;
    }


    public function getImageLink(): ?string
    {
        return $this->imageLink;
    }

    public function getDownloadLink(): ?string
    {
        return $this->downloadLink;
    }


    public function getFkTip(): ?Tip
    {
        return $this->fkTip;
    }


    public function getFkNutritionForm(): ?NutritionForm
    {
        return $this->fkNutritionForm;
    }


    public function getFkCategory(): ?Category
    {
        return $this->fkCategory;
    }

    public function getFkDifficulty(): ?Difficulty
    {
        return $this->fkDifficulty;
    }


    /**
     * @return Collection|Allergen[]
     */
    public function getAllergen(): Collection
    {
        return $this->allergen;
    }


    /**
     * @return Collection|Origin[]
     */
    public function getOrigin(): Collection
    {
        return $this->origin;
    }


}
