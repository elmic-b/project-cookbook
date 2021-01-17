<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 17.01.2021
 * Time: 06:17
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StartController extends AbstractController
{

    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage(){
        return $this->render('start/homepage.html.twig');
    }



    /**
     * @Route("/start/{slug}",name="app_start_show")
     */
    public function show($slug){

        $answers= [
            'a', 'b', 'c'
            ];


        dump($this);

        return $this->render('start/show.html.twig',[
            'start' => ucwords(str_replace("-"," ",$slug)),
            'answers' => $answers
        ]);

    }
}