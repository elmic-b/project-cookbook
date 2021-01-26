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
// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

class DefaultController extends AbstractController
{

    /**
     * @Route("/" , name="app_home")
     */
    public function home(){

        $entityManager = $this->getDoctrine()->getManager();
        $conn = $entityManager->getConnection();

        $sql = 'SELECT Recipe.* , Difficulty.*, Category.*, Nutrition_form.* FROM Recipe
INNER JOIN Difficulty ON Recipe.fk_difficulty_id = Difficulty.difficulty_id
INNER JOIN Category ON fk_category_id = category_id
INNER JOIN Nutrition_form ON fk_nutrition_form_id=nutrition_form_id
limit 3
';

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // returns an array of Product objects
        $results = $stmt->fetchAll();


        return $this->render('start/home.html.twig', [

            'recipe' => $results,

        ]);

    }



    /**
     * @Route("/default" , name="app_default")
     */
    public function default(){

        // Configure Dompdf according to your needs
     /*   $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('start/default.html.twig', [
            'title' => "Welcome to our PDF Test"
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("default.pdf", [
            "Attachment" => true
        ]);
*/

        return $this->render('start/default.html.twig');
    }


    /**
     * @Route("/kontakt" , name="app_kontakt")
     */
    public function kontakt(){
        return $this->render('start/kontakt.html.twig');
    }

}