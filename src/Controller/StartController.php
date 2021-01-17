<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 17.01.2021
 * Time: 06:17
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StartController
{

    /**
     * @Route("/")
     */
    public function homepage(){
        return new Response('hallo');
    }


    /**
     * @Route("/questions/{slug}")
     */
    public function show($slug){
        return new Response(sprintf('new question:  "%s"',
            ucwords(str_replace("-"," ",$slug))
            ));
    }
}