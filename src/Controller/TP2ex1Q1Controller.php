<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

setlocale(LC_TIME, 'fra_fra');
date_default_timezone_set('Europe/Paris');



class TP2ex1Q1Controller extends AbstractController
{
    /**
     * @Route("/q1", name="app_t_p2ex1_q1")
     */
    public function index(Request $request): Response
    {
        $nom=$request->request->get("nom");
        $prenom=$request->request->get("prenom");
        $madate = strftime('%A %d %B %Y, %H:%M');
        return $this->render('tp2ex1_q1/index.html.twig', [
            'controller_name' => 'TP2ex1Q1Controller',
            'madate'=> $madate, 
            'nom'=> $nom,
            'prenom' => $prenom, 
        ]);
    }

    /**
     * @Route("/q1-2", name="app_t_p2ex1_q1-2")
     */
    public function index2(): Response
    {
        
        return $this->render('tp2ex1_q1/index2.html.twig', [
            'controller_name' => 'TP2ex1Q1Controller',
            
        ]);
    }
}
