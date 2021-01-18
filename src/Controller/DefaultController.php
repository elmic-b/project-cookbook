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

class DefaultController extends AbstractController
{

    /**
     * @Route("/" , name="app_home")
     */
    public function home(){
        return $this->render('start/home.html.twig');
    }


    /**
     * @Route("/kontakt" , name="app_kontakt")
     */
    public function kontakt(){
        return $this->render('start/kontakt.html.twig');
    }

}