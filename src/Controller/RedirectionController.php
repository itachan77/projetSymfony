<?php
//src/Controller/IndexController.php

namespace App\Controller;            



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;




/**
* @Route("/")
*/
class RedirectionController extends AbstractController
{
private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }



/**
* @Route("/redirection", name="redirection")
*/
	public function testredirection(Request $request)
	{

		if(in_array("ROLE_USER",$this->getUser()->getRoles())) {

			//Après succès de la connexion, Le role admin est dirigé vers la route (route_index) - Voir Admincontroller
				//if($this->getUser()->getRoles()[0]=="ROLE_ADMIN") 

			if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
			{
				return $this->redirect($this->generateUrl('route_index'));
			}

			//Après succès de la connexion, Le role SUPER_ADMIN (moi) est dirigé vers la route (route_index) - Voir Admincontroller
				//if($this->getUser()->getRoles()[0]=="ROLE_SUPER_ADMIN") 

			if(in_array("ROLE_SUPER_ADMIN",$this->getUser()->getRoles()))
			{
				return $this->redirect($this->generateUrl('route_index'));
			}


			//Après succès de la connexion, Le role eleve est dirigé vers la route (accueil_eleve) - controller
			//	else if ($this->getUser()->getRoles()[0]=="ROLE_ELEVE") 
			
			else if(in_array("ROLE_ELEVE",$this->getUser()->getRoles()))
			{
				$id=$this->getUser()->getId();
				//$idEleve=$this->getUser()->getEleve()->getId();
				return $this->redirect($this->generateUrl('accueil_eleve', array('id'=> $id)));
			}

			//Après succès de la connexion, Le role teacher est dirigé vers la route (accueil_professeur) - Voir ProfAdController.php
				//else if ($this->getUser()->getRoles()[0]=="ROLE_PROFESSEUR") 
			
			else if(in_array("ROLE_PROFESSEUR",$this->getUser()->getRoles()))
			{
				$id=$this->getUser()->getId();
				//$idProf=$this->getUser()->getProfesseur()->getId();
				return $this->redirect($this->generateUrl('accueil_professeur', array('id'=> $id)));
			}

		}
		
		else {
			return new Response('Vous n\'êtes pas utilisateur');
		}

		

    }



}