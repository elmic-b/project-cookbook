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
     * @Route("/")
     */
    public function homepage(){
        return new Response('hallo');
    }


    /**
     * @Route("/start/{slug}")
     */
    public function show($slug){

        $answers= [
            'a', 'b', 'c'
            ];

        return $this->render('start/show.html.twig',[
            'start' => ucwords(str_replace("-"," ",$slug)),
            'answers' => $answers
        ]);

    }
}