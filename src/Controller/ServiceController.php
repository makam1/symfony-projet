<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employe;
use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\EmployeType;

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
        return $this->render('service/home.html.twig');
    }
    /**
     * @Route("/service/ajouter", name="ajouter")
     * @Route("/service/{id}/modif", name="modif")
     */
    public function ajouter(Employe $employe= Null,Request $requete, ObjectManager $manager)
    {

        if(!$employe){

            $employe = new Employe();
        }   

        $form= $this->createForm(EmployeType::class,$employe);

        $form->handleRequest($requete);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($employe);
            $manager->flush();

        return $this->redirectToRoute('modifier');

        }

        return $this->render('service/ajouter.html.twig',[
            'formemploye'=>$form->createView()
        ]);
    }
    /**
     * @Route("/service/supprimer", name="supprimer")
     */
    public function supprimer()
    {
        return $this->render('service/supprimer.html.twig');
    }


    /**
     * @Route("/service/modifier", name="modifier")
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
