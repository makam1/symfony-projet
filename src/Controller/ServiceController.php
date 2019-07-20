<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    /**
     * @Route("/service", name="service")
     */
    public function index()
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function accueil()
    {
        return $this->render('service/accueil.html.twig');
    }
    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function ajouter()
    {
        return $this->render('service/ajouter.html.twig');
    }
    /**
     * @Route("/supprimer", name="ajouter")
     */
    public function supprimer()
    {
        return $this->render('service/supprimer.html.twig');
    }
    /**
     * @Route("/modifier", name="ajouter")
     */
    public function modifier()
    {
        return $this->render('service/modifier.html.twig');
    }
}
