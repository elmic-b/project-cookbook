<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 17.01.2021
 * Time: 06:17
 */

namespace App\Controller;


use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Twig\Environment;

class StartController extends AbstractController
{

    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage( Environment $twigEnvironment){
        return $this->render('start/homepage.html.twig');
    }



    /**
     * @Route("/start/{slug}",name="app_start_show")
     */
    public function show($slug, MarkdownParserInterface $markdownParser, CacheInterface $cache){

        $answers= [
            'abc `tics` lolo' , 'b', 'c'
            ];

        $questionText='I\'ve been turned into a cat, any *thoughts* on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';
        $parsedQuestionText = $cache->get('markdown_'.md5($questionText), function () use ($questionText, $markdownParser){

            return $markdownParser->transformMarkdown($questionText);
        });

        dump($this);

        return $this->render('start/show.html.twig',[
            'start' => ucwords(str_replace("-"," ",$slug)),
            'questionText' => $parsedQuestionText,
            'answers' => $answers
        ]);

    }
}