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
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Application;
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
     * @Route("/onlinebuch/0" , name="app_rezepte-uebersicht_1")
     */
    public function onlinebuch_()
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
     * @Route("/onlinebuch/5" , name="app_rezepte-uebersicht_2")
     */
    public function onlinebuch_l()
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


        $sqlCooking = 'SELECT cooking, heading FROM Recipe INNER JOIN Cooking On recipe_id = fk_recipe_id
where recipe_id=' . $id;


        $stmtCooking = $conn->prepare($sqlCooking);
        $stmtCooking->execute();
        // returns an array of Product objects
        $resultsCooking = $stmtCooking->fetchAll();


        $sqlIngridients = 'SELECT * from recipe
    INNER JOIN Heading_ing ON fk_recipe=recipe_id
INNER JOIN Ingridient ON fk_head= heading_ing_id
where recipe_id=' . $id;


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
            'nutrition' => $nutritionForm,
            'cooking' => $resultsCooking,
            'ingridients' => $resultsIng
        ]);


        //   return new Response('Check out this great product: '. $test);
        // return $this->render('onlinebuch/rezept.html.twig');
    }

    /**
     * @Route("/onlinebuch/{id}/download" , name="app_rezept_download")
     */
    public function download(int $id, RecipeRepository $recipeRepository){
        $recipe = $recipeRepository->find($id);

        $category = $recipe->getFkCategory()->getCategory();
        $nutritionForm = $recipe->getFkNutritionForm()->getNutrition();
        $difficulty = $recipe->getFkDifficulty()->getDifficulty();


        $entityManager = $this->getDoctrine()->getManager();
        $conn = $entityManager->getConnection();


        $sqlCooking = 'SELECT cooking, heading FROM Recipe INNER JOIN Cooking On recipe_id = fk_recipe_id
where recipe_id=' . $id;


        $stmtCooking = $conn->prepare($sqlCooking);
        $stmtCooking->execute();
        // returns an array of Product objects
        $resultsCooking = $stmtCooking->fetchAll();


        $sqlIngridients = 'SELECT * from recipe
    INNER JOIN Heading_ing ON fk_recipe=recipe_id
INNER JOIN Ingridient ON fk_head= heading_ing_id
where recipe_id=' . $id;


        $stmtIng = $conn->prepare($sqlIngridients);
        $stmtIng->execute();
        // returns an array of Product objects
        $resultsIng = $stmtIng->fetchAll();


        // Configure Dompdf according to your needs
          $pdfOptions = new Options();
           $pdfOptions->set('defaultFont', 'Arial');

           // Instantiate Dompdf with our options
           $dompdf = new Dompdf($pdfOptions);

        $dompdf->setBasePath('');


           // Retrieve the HTML generated in our twig file
           $html = $this->renderView('onlinebuch/download.html.twig', [
               'recipe' => $recipe,
               'category' => $category,
               'difficulty' => $difficulty,
               'nutrition' => $nutritionForm,
               'cooking' => $resultsCooking,
               'ingridients' => $resultsIng
           ]);

           // Load HTML to Dompdf

           $dompdf->loadHtml($html);

           // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
           $dompdf->setPaper('A4', 'portrait');

           // Render the HTML as PDF
           $dompdf->render();

           // Output the generated PDF to Browser (force download)
           $dompdf->stream("default.pdf", [
               "Attachment" => true
           ]);

    }

}