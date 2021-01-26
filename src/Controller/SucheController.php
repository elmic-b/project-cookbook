<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 18.01.2021
 * Time: 05:50
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SucheController extends AbstractController
{





    /**
     * @Route("/suche" , name="app_suche")
     */
    public function suche()
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

        return $this->render('start/suche.html.twig', [

            'recipe' => $results,

        ]);


        // return $this->render('onlinebuch/rezepte-uebersicht.html.twig');
    }
}