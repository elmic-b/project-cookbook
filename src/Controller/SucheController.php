<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 18.01.2021
 * Time: 05:50
 */

namespace App\Controller;


use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SucheController extends AbstractController
{

    /**
     * @Route("/suche" , name="app_suche")
     */
    public function suche(RecipeRepository $recipeRepository, Request $request): Response
    {
        $q = $request->query->get('q');
        $recipe = $recipeRepository->findAllWithSearch($q);

        return $this->render('start/suche.html.twig', [
            'recipe' => $recipe
        ]);

    }
}