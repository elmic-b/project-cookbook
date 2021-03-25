<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 19.01.2021
 * Time: 05:37
 */

namespace App\Controller;

use App\Repository\HeadingIngRepository;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RezeptController extends AbstractController
{

    /**
     * @Route("/onlinebuch" , name="app_rezepte-uebersicht")
     */
    public function onlinebuch(RecipeRepository $recipeRepository, Request $request): Response
    {
        $difficulty = $request->query->get('difficulty');
        $nutrition = $request->query->get('nutrition');
        $category = $request->query->get('category');
        $recipe = $recipeRepository->filterFunction($difficulty, $nutrition, $category);
        return $this->render('onlinebuch/rezepte-uebersicht.html.twig', [
            'recipe' => $recipe,
        ]);
    }


    /**
     * @Route("/onlinebuch/anfang" , name="app_back_to_start")
     */
    public function back_to_start(RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->findAll();

        return $this->render('onlinebuch/rezepte-uebersicht.html.twig', [
            'recipe' => $recipe,
        ]);
    }


    /**
     * @Route("/onlinebuch/ende" , name="app_back_to_overview")
     */
    public function back_to_overview(RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->findAll();

        return $this->render('onlinebuch/rezepte-uebersicht.html.twig', [
            'recipe' => $recipe,
        ]);
    }


    /**
     * @Route("/onlinebuch/{slug}" , name="app_rezept")
     */
    public function rezept(string $slug, RecipeRepository $recipeRepository, HeadingIngRepository $headingIngRepository): Response
    {
        $recipetest = $recipeRepository->findBy(
            ['name' => $slug]
        );
        $id = $recipetest[0]->getRecipeId();


        $recipe = $recipeRepository->find($id);
        if ($recipeRepository->find($id - 1) != null) {
            $voriges = $recipeRepository->find($id - 1)->getName();
        } else {
            $voriges = "anfang";
        }
        if ($recipeRepository->find($id + 1) != null) {

            $naechstes = $recipeRepository->find($id + 1)->getName();
        } else {
            $naechstes = "ende";
        }
        $cooking = $recipe->getCooking();
        $headingIng = $recipe->getHeadingIng();
        $ingridients = $headingIngRepository->findByIdJoinedToIngridient($id);

        return $this->render('onlinebuch/rezept.html.twig', [
            'recipe' => $recipe,
            'cooking' => $cooking,
            'headingIng' => $headingIng,
            'ingridients' => $ingridients,
            'vorige' => $voriges,
            'naechste' => $naechstes
        ]);

    }
}