<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Annonce;

class LeBonCubeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // Récupère toutes les annonces de la base de données
        $items = $this->getDoctrine()->getRepository(Annonce::class)->findAll();

        return $this->render('le_bon_cube/index.html.twig', [
            'controller_name' => 'LeBonCubeController',
            'items' => $items
        ]);
    }
}
