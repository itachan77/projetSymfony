<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passEncoder)
    {
        $form=$this->createFormBuilder()

        ->add('username')

        ->add('password', RepeatedType::class, [
            'type'=>PasswordType::class,
            'required'=>true,
            'first_options'=>['label'=>'Mot de passe'],
            'second_options'=>['label'=>'Confirmation du Mot de passe'],
            'attr'=>['class'=>'form-control'],
            
        ])

        ->add('roles', ChoiceType::class, [
            'choices'=> [
                'ROLE_USER'=>'ROLE_USER',
                'ROLE_ELEVE'=>'ROLE_ELEVE',
                'ROLE_ADMIN'=>'ROLE_ADMIN',
                'ROLE_PROFESSEUR'=>'ROLE_PROFESSEUR',
                'ROLE_SUPER_ADMIN'=>'ROLE_SUPER_ADMIN',
            ],
            'multiple'=>true
        ])
        
        ->add('valider', SubmitType::class)
        ->getForm();

        $form->handleRequest($request);

        /*
        $tempPassword = $this->randomPassword();
        */

        if($request->isMethod('post') && $form->isValid()) {
            $data=$form->getData();
            $user=new User;
            $user->setUsername($data['username']);
            $user->setPassword(
            /*    
            $passEncoder->encodePassword($user,$tempPassword)
            */

            $passEncoder->encodePassword($user,$data['password'])
            );
            $user->setRoles($data['roles']);
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            // Envoyer un mail à l'utilisateur en lui envoyant $tempPassword
            // 
            return $this->redirect($this->generateUrl('app_login'));
        }

        return $this->render('register/register.html.twig', [
            
            'form_register'=>$form->createView(),
        ]);
    }







    /*
    private function randomPassword() 
    
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

    */








}
