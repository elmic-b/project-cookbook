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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/" , name="app_home")
     */
    public function home(RecipeRepository $recipeRepository)
    {
        $recipe = $recipeRepository->findBy([],  array('recipeId' => 'DESC'), 3, null);
        return $this->render('start/home.html.twig', [
            'recipe' => $recipe,
        ]);
    }


    /**
     * @Route("/impressum" , name="app_impressum")
     */
    public function impressum()
    {
        return $this->render('start/impressum.html.twig');
    }



}