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
    public function home(){
        return $this->render('start/suche.html.twig');
    }

}