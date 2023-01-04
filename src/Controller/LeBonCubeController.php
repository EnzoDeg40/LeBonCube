<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LeBonCubeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $item = [
            'title' => 'Le Bon Cube',
            'price' => '50.40',
            'description' => 'Article',
            'categorie' => 'Minerais',
            'date' => '2023-01-04',
        ];

        return $this->render('le_bon_cube/index.html.twig', [
            'controller_name' => 'LeBonCubeController',
            'item' => $item,
        ]);
    }
}
