<?php
/**
 * Created by PhpStorm.
 * User: Elma
 * Date: 17.01.2021
 * Time: 09:05
 */

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommentController extends AbstractController
{

    /**
     * @Route("/comments/{id}/vote/{direction<up|down>}")
     */
    public function commentVote($id, $direction, LoggerInterface $logger){

        if ($direction ==='up'){
            $logger->info('VOrint up');
            $currentVoteCount = rand(7,100);
        }
        else{
            $logger->info('VOrint down');
            $currentVoteCount = rand(0,5);
        }


        return $this->json(['votes'=> $currentVoteCount]);
    }
}