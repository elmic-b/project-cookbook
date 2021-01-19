<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 19.01.2021
 * Time: 05:37
 */

namespace App\Controller;


use App\Entity\Recipe;
use App\Repository\AllergenRepository;
use App\Repository\RecipeAllergenRepository;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RezeptController extends AbstractController
{

    /**
     * @Route("/onlinebuch" , name="app_rezepte-uebersicht")
     */
    public function onlinebuch(){
        return $this->render('onlinebuch/rezepte-uebersicht.html.twig');
    }



    /**
     * @Route("/onlinebuch/{id}" , name="app_rezept")
     */
    public function rezept(int $id, RecipeRepository $recipeRepository):Response
    {

       // $recipe = $recipeRepository->findOneBy(['name' => 'Piroggen']);

        $recipe= $recipeRepository->find($id);


        if (!$recipe) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render('onlinebuch/rezept.html.twig',[
            'recipe' => $recipe,
        ]);

       // return new Response('Check out this great product: '.$recipe->getName());
        //return $this->render('onlinebuch/rezept.html.twig');
    }


}