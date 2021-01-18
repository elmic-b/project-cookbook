<?php

namespace App\Controller;

use App\Entity\Allergen;
use App\Repository\AllergenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\All;

class ProductController extends AbstractController
{
/*
    /**
     * @Route("/product", name="create_product")
     */
 /*   public function createProduct(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Allergen();
        $product->setAllergenId(1);
        $product->setAbbr('A');
        $product->setName('Gluten');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id ' . $product->getId());

        $errors = $validator->validate($product);
        if (count($errors) > 0) {
            return new Response((string)$errors, 400);
        }

    }
*/


        /**
         * @Route("/product/{id}", name="product_show")
         */
    public function show(Allergen $product): Response
    {

        return $this->render('product/index.html.twig',[
            'product' => $product,
            'name' => $product->getName()
        ]);
        //return new Response('Check out this great product: '.$product->getName());
        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }



}


