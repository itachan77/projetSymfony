<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Eleve;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



/** @Route("/admin") 
 * 
 * @Security("is_granted('ROLE_ADMIN')")
 */ 
class MdpController extends AbstractController
{


    /**
     * @Route("/pw/perso/{id}", name="pw_upd")
     */

    public function AttribuerMdp_perso(Request $request, $id, UserPasswordEncoderInterface $passEncoder): Response
    {
        
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleve=$eleveRepository->find($id);
        $eleves=$eleveRepository->findAll(); //pour la recherche de l'entete, $eleves est à renseigner


        $user=new User;
        $user
        ->setUsername($eleve->getEmailEleve())
        ->setEleve($eleve);

        $form=$this->createForm(UserType::class,$user)
        ->add('createUser', SubmitType::class, ['label'=>'Créer un compte utilisateur pour cet élève']);


        $form->handleRequest($request);

        $mdpAleatoire="";

        if ($request->isMethod('post') && $form->isValid()) 
        {

            $mdpAleatoire=$this->randomPassword();
            $user
            ->setRoles(['ROLE_USER'])
            ->setPassword($passEncoder->encodePassword($user,$mdpAleatoire));
            $em->persist($user);
            $em->flush();
        }

        return $this->render('admin/pw.html.twig', [
            'uneleve' => $eleve,
            'form' => $form->createView(),
            'eleves' => $eleves,
            'mdpAleatoire' => $mdpAleatoire

        ]);
    }






    public function randomPassword() 
    
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) 
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string

    }



}