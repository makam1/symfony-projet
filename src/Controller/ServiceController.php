<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employe;
use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Request;


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
     * @Route("/service/ajouter", name="ajouter")
     */
    public function ajouter(Request $requete)
    {
        return $this->render('service/ajouter.html.twig');
    }
    /**
     * @Route("/service/supprimer", name="ajouter")
     */
    public function supprimer()
    {
        return $this->render('service/supprimer.html.twig');
    }


    /**
     * @Route("/service/modifier", name="ajouter")
     */
    public function modifier(EmployeRepository $repo)

    {
        $employes= $repo->findAll();
        return $this->render('service/modifier.html.twig',[
            'controller_name'=>'ServiceController',
            'employes'=>$employes
        ]);
    }
}
