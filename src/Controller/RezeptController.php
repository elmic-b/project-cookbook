<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 19.01.2021
 * Time: 05:37
 */

namespace App\Controller;


use App\Entity\Category;
use App\Entity\Recipe;
use App\Repository\AllergenRepository;
use App\Repository\CategoryRepository;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RezeptController extends AbstractController
{

    /**
     * @Route("/onlinebuch" , name="app_rezepte-uebersicht")
     */
    public function onlinebuch()
    {

/*
        $recipe = $recipeRepository->find($id);

        $category = $recipe->getFkCategory()->getCategory();
        $nutritionForm = $recipe->getFkNutritionForm()->getNutrition();
        $difficulty = $recipe->getFkDifficulty()->getDifficulty();
*/

        $entityManager = $this->getDoctrine()->getManager();
        $conn = $entityManager->getConnection();

        $sql = 'SELECT Recipe.* , Difficulty.*, Category.*, Nutrition_form.* FROM Recipe
INNER JOIN Difficulty ON Recipe.fk_difficulty_id = Difficulty.difficulty_id
INNER JOIN Category ON fk_category_id = category_id
INNER JOIN Nutrition_form ON fk_nutrition_form_id=nutrition_form_id
';

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // returns an array of Product objects
        $results = $stmt->fetchAll();


        return $this->render('onlinebuch/rezepte-uebersicht.html.twig', [

            'recipe' => $results,

        ]);


       // return $this->render('onlinebuch/rezepte-uebersicht.html.twig');
    }


    /**
     * @Route("/onlinebuch/{id}" , name="app_rezept")
     */
    public function rezept(int $id, RecipeRepository $recipeRepository): Response
    {

        $recipe = $recipeRepository->find($id);

        $category = $recipe->getFkCategory()->getCategory();
        $nutritionForm = $recipe->getFkNutritionForm()->getNutrition();
        $difficulty = $recipe->getFkDifficulty()->getDifficulty();


        $entityManager = $this->getDoctrine()->getManager();
        $conn = $entityManager->getConnection();

        $sqlAllergen = 'SELECT A2.name
FROM Recipe
       Inner JOIN recipe_allergen a on Recipe.recipe_id = a.recipe_id
       INNER JOIN Allergen A2 on a.allergen_id = A2.allergen_id
where Recipe.recipe_id = '.$id;


        $stmtAllergen = $conn->prepare($sqlAllergen);
        $stmtAllergen->execute();
        // returns an array of Product objects
        $resultsAllergen = $stmtAllergen->fetchAll();

        $sqlCooking = 'SELECT cooking, heading FROM Recipe INNER JOIN Cooking On recipe_id = fk_recipe_id
where recipe_id='.$id;


        $stmtCooking = $conn->prepare($sqlCooking);
        $stmtCooking->execute();
        // returns an array of Product objects
        $resultsCooking = $stmtCooking->fetchAll();


        $sqlIngridients = 'SELECT Ingridient.name, portion FROM Recipe INNER JOIN recipe_ingridient On Recipe.recipe_id = recipe_ingridient.recipe_id
INNER JOIN Ingridient on recipe_ingridient.ingridient_id = Ingridient.ingridient_id
where Recipe.recipe_id='.$id;


        $stmtIng = $conn->prepare($sqlIngridients);
        $stmtIng->execute();
        // returns an array of Product objects
        $resultsIng = $stmtIng->fetchAll();



        //$category = $categoryRepository->findOneBy(['recipe' => $recipe.fkCategory]);
        if (!$recipe) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render('onlinebuch/rezept.html.twig', [
            'recipe' => $recipe,
            'category' => $category,
            'difficulty' => $difficulty,
            'allergene' => $resultsAllergen,
            'nutrition' => $nutritionForm,
            'cooking' => $resultsCooking,
            'ingridients' => $resultsIng
        ]);


        //   return new Response('Check out this great product: '. $test);
        // return $this->render('onlinebuch/rezept.html.twig');
    }

}