<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class HomeController extends AbstractController {
       #[Route('/Accueil', name: 'app_Acceuil')]
        public function index() : Response {
            return $this->render('pages/Accueil.html.twig',[

            ]);
        }
    }



?>