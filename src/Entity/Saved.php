<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Saved
 *
 * @ORM\Table(name="saved", indexes={@ORM\Index(name="fk_recipe_user", columns={"fk_recipe_user"}), @ORM\Index(name="fk_user_recipe", columns={"fk_user_recipe"})})
 * @ORM\Entity(repositoryClass="App\Repository\SavedRepository")
 */
class Saved
{
    /**
     * @var int
     *
     * @ORM\Column(name="saved_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $savedId;

    /**
     * @var \Recipe
     *
     * @ORM\ManyToOne(targetEntity="Recipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_recipe_user", referencedColumnName="recipe_id")
     * })
     */
    private $fkRecipeUser;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_user_recipe", referencedColumnName="user_id")
     * })
     */
    private $fkUserRecipe;

    public function getSavedId(): ?int
    {
        return $this->savedId;
    }

    public function getFkRecipeUser(): ?Recipe
    {
        return $this->fkRecipeUser;
    }

    public function setFkRecipeUser(?Recipe $fkRecipeUser): self
    {
        $this->fkRecipeUser = $fkRecipeUser;

        return $this;
    }

    public function getFkUserRecipe(): ?User
    {
        return $this->fkUserRecipe;
    }

    public function setFkUserRecipe(?User $fkUserRecipe): self
    {
        $this->fkUserRecipe = $fkUserRecipe;

        return $this;
    }


}
