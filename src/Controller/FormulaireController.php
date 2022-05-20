<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ville;
use App\Entity\Univ;
use App\Entity\Intitule;
use App\Entity\BUT;
use App\Entity\Diplome;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
     * @Route("/insertUniv", name="app_insert_univ")
     */
    public function insertUniv(): Response
    {
        return $this->render('formulaire/insertUniv.html.twig', [
            'controller_name' => 'nouvelle université',
        ]);
    }
     /**
     * @Route("/insertBUT", name="app_insert_BUT")
     */
    public function insertBUT(Request $request, EntityManagerInterface $manager): Response
    {
		$sess = $request->getSession();
		//Récupération et transfert du fichier
		//dd($request->request->get('choix'));
		$logo = $request->files->get("fichier");
		if ($logo){
			$newFilename = uniqid('', true) . "." . $logo->getClientOriginalExtension();
            $logo->move($this->getParameter('upload'), $newFilename);
        return $this->render('formulaire/insertBUT.html.twig', [
            'controller_name' => 'nouveau BUT',
        ]);
    }else{
		return $this->render('formulaire/insertBUT.html.twig',);
		
	}
	}
    /**
     * @Route("/insertIntitule", name="app_insert_intitule")
     */
    public function insertIntitule(): Response
    {
        return $this->render('formulaire/insertIntitule.html.twig', [
            'controller_name' => 'nouvel intitulé',
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
     * @Route("/univ", name="app_univ")
     */
    public function univ(Request $request, EntityManagerInterface $manager): Response
    {
        $univ = new Univ();
        $univ->setNom($request->request->get("univ"));
        $manager->persist($univ);
        $manager->flush();
        return $this->render('formulaire/insertUniv.html.twig',[
            'controller_name' => 'nouvelle université'
        ]);
    }
    /**
     * @Route("/but", name="app_but")
     */
    public function but(Request $request, EntityManagerInterface $manager): Response
    {
        $but = new BUT();
        $but->setNom($request->request->get("but"));
        $manager->persist($but);
        $manager->flush();
        return $this->render('formulaire/insertBUT.html.twig',[
            'controller_name' => 'nouveau BUT'
        ]);
    }
    /**
     * @Route("/intitule", name="app_intitule")
     */
    public function intitule(Request $request, EntityManagerInterface $manager): Response
    {
        $intitule = new Intitule();
        $intitule->setNom($request->request->get("intitule"));
        $manager->persist($intitule);
        $manager->flush();
        return $this->render('formulaire/insertIntitule.html.twig',[
            'controller_name' => 'nouvelle intitulé'
        ]);
    }

    /**
     * @Route("/diplome", name="app_diplome")
     */
    public function diplome(Request $request, EntityManagerInterface $manager): Response
    {
        dump($request->request->get("ville"));
        $diplome = new Diplome();
		dump($request->request->get("but"));
        $diplome->setIntitule($manager->getRepository(Intitule::class)->findOneById($request->request->get("intitule")));
        $diplome->setVille($manager->getRepository(Ville::class)->findOneById($request->request->get("ville")));
        $diplome->setBut($manager->getRepository(But::class)->findOneById($request->request->get("but")));
        $diplome->setUniv($manager->getRepository(Univ::class)->findOneById($request->request->get("univ")));
        $manager->persist($diplome);
        $manager->flush();
        return $this->redirectToRoute('app_insert_diplome');
    }
         
	/**
     * @Route("/info", name="app_info")
     */
    public function info(Request $request, EntityManagerInterface $manager): Response
    {
        $info = $manager->getRepository(Diplome::class)->findByVille($request->request->get('ville'));
        return $this->render('formulaire/infoville2.html.twig', [
            'info'=> $info,
            'controller_name' => 'Informations détaillées',
        ]);
    }
	
    /**
     * @Route("/infoVille", name="app_info_ville")
     */
    public function infoVille(EntityManagerInterface $manager): Response
    {
        return $this->render('formulaire/infoville.html.twig', [
            'villes'=>$manager->getRepository(Ville::class)->findAll()
        ]);
    }
}
