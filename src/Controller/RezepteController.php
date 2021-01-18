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

class RezepteController extends AbstractController
{

    /**
     * @Route("/onlinebuch" , name="app_onlinebuch")
     */
    public function rezepte_uebersicht(){
        return $this->render('onlinebuch/rezepte-uebersicht.html.twig');
    }


    /**
     * @Route("/onlinebuch/rezept" , name="app_rezept")
     */
    public function rezepte(){
        return $this->render('onlinebuch/rezept.html.twig');
    }

}