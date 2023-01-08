<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Annonce;
use App\Entity\User;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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

    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        // Return to login page if user is not logged in
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $annonce = new Annonce();

        $form = $this->createFormBuilder($annonce)
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('description', TextareaType::class, ['attr' => ['rows' => 10]])
            ->add('price', MoneyType::class, [
                'divisor' => 100,
                'currency' => 'EUR',
                'attr' => ['placeholder' => '0.00'],
                'label' => 'Prix'
            ])
            ->add('submit', SubmitType::class, ['label' => 'Créer l\'annonce'])
            ->getForm();

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce = $form->getData();

            $annonce->setUserId($this->getUser()->getId());
            $annonce->setCreatedAt(new \DateTime());
            $annonce->setUpdatedAt(new \DateTime());
            $annonce->setCategory('1');

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('le_bon_cube/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/annonce/{id}', name: 'show')]
    public function show($id): Response
    {
        // si {id} n'est pas un nombre, on redirige vers la page d'accueil
        if (!is_numeric($id)) {
            return $this->redirectToRoute('home');
        }

        // Récupère une annonce de la base de données
        $item = $this->getDoctrine()->getRepository(Annonce::class)->find($id);

        if(!$item) {
            return $this->redirectToRoute('home');
        }

        return $this->render('le_bon_cube/show.html.twig', [
            'item' => $item
        ]);
    }
}
