<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class OpenclassDutController extends AbstractController
{
   /**
     * @Route("/", name="Accueil")
     */
    public function index(): Response
    {
        return $this->render('openclass_dut/index.html.twig');
    }


    /**
     * @Route("/entreprises", name="entreprises")
     */
    public function afficherEntreprises(): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les ressources enregistrées en BD
        $stages = $repositoryStage->findAll();
        return $this->render('openclass_dut/afficherEntreprises.html.twig',['stages'=>$stages]);}
    /**
     * @Route("/formations", name="formations")
     */
    public function afficherFormations(): Response
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

        // Récupérer les ressources enregistrées en BD
        $formations = $repositoryFormation->findAll();
        return $this->render('openclass_dut/afficherFormations.html.twig',['formations' => $formations]);
    }
    /**
     * @Route("/stages", name="openclass_dut")
     */
    public function afficherDescriptifStage($id): Response
    {
        
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les ressources enregistrées en BD
        $stage = $repositoryStage->find($id);
        return $this->render('openclass_dut/afficherDescriptifStages.html.twig', 
        ['stage' => $stage]);
    }
   
   
    }

