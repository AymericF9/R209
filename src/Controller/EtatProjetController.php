<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatProjetController extends AbstractController
{
    /**
     * @Route("/etat/projet", name="app_etat_projet")
     */
    public function index(): Response
    {
        return $this->render('etat_projet/index.html.twig', [
            'controller_name' => 'EtatProjetController',
        ]);
    }
}
