<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ville;
use App\Entity\Diplome;
use Doctrine\ORM\EntityManagerInterface;

class FormulaireController extends AbstractController
{
    /**
     * @Route("/insertVille", name="app_insert_ville")
     */
    public function index(): Response
    {
        return $this->render('formulaire/insertVille.html.twig', [
            'controller_name' => 'nouvelle ville',
        ]);
    }

    /**
     * @Route("/ville", name="app_ville")
     */
    public function ville(Request $request, EntityManagerInterface $manager): Response
    {
        $ville = new Ville();
        $ville->setNom($request->request->get("ville"));
        $manager->persist($ville);
        $manager->flush();
        return $this->render('formulaire/insertVille.html.twig',[
            'controller_name' => 'nouvelle ville'
        ]);
    }


     /**
     * @Route("/insertDiplome", name="app_insert_diplome")
     */
    public function insertDiplome(EntityManagerInterface $manager): Response
    {
        //récupération de toutes les villes
        $villes = $manager->getRepository(Ville::class)->findAll();
        return $this->render('formulaire/insertDiplome.html.twig', [
            'villes'=> $villes,
        ]);
    }

}
