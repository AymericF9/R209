<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatNoteController extends AbstractController
{
    /**
     * @Route("/etat/note", name="app_etat_note")
     */
    public function index(): Response
    {
        return $this->render('etat_note/index.html.twig', [
            'controller_name' => 'EtatNoteController',
        ]);
    }
}
