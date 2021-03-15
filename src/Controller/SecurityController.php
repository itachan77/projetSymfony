<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


//Donne toutes les infos pour accéder à la page d'authentiifcation
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/login/oubli", name="app_loginOubli")
     */
    public function app_loginOubli(\Swift_Mailer $mailer,Request $request,UserRepository $userRepository,AuthenticationUtils $authenticationUtils): Response
    {

        $form=$this->createFormBuilder()
        ->add('username')
        ->add('Valider', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);

        if($request->isMethod('post') && $form->isValid()) {

            $data=$form->getData();
            $dataUser = $data['username'];
            $user=$userRepository->findBy(['username'=>$dataUser]);


            if ($user) {
                $id=$user[0]->getId();
                $user=$userRepository->find($id);
                

                $objet="La Scuola - Oubli de votre mot de passe";
                $from="itachan2701@gmail.com";
    
                $message=(new \Swift_Message($objet))
                ->setFrom($from)
                ->setTo($dataUser)
                ->setBody(
                    $this->renderView(
                        'register/mailORegister.html.twig',[
                            'username' => $dataUser,
                            'user' => $user,
                        ]),
                        'text/html'
                    );
                    
                $mailer->send($message);

                //return $this->redirect($this->generateUrl('oubliRegister', array('username' => $dataUser)));

                $session=$request->getSession();
                $session->getFlashBag()->add('message','Nous venons de vous envoyer un email pour changer votre mot de passe');
                $session->set('statut','warning');
                return $this->redirect($this->generateUrl('app_loginOubli', [
                    'message' => $session,
                ]));

            }

            else {
            $session2=$request->getSession();
            $session2->getFlashBag()->add('message','Cet identifiant n\'existe pas');
            $session2->set('statut','warning');
            return $this->redirect($this->generateUrl('app_loginOubli', [
                'message2' => $session2,
            ]));
            }

        }

        return $this->render('security/oubli.html.twig', [
            'form' => $form->createView(),
            
        ]);
    }
    
    /**
     * @Route("/login/oubliRegister/{id}", name="oubliRegister")
     */
    public function oubliRegister($id, UserPasswordEncoderInterface $passEncoder,UserRepository $userRepository,Request $request,AuthenticationUtils $authenticationUtils): Response
    {
        
        $user=$userRepository->find($id);
        
        $form=$this->createFormBuilder()

        ->add('password', RepeatedType::class, [
            'type'=>PasswordType::class,
            'required'=>true,
            'first_options'=>['label'=>'Mot de passe'],
            'second_options'=>['label'=>'Confirmation du Mot de passe'],
            'attr'=>['class'=>'form-control'],
        ])
        
        ->add('Valider', SubmitType::class)
        ->getForm();

        $form->handleRequest($request);

        /*
        $tempPassword = $this->randomPassword();
        */

        if($request->isMethod('post') && $form->isValid()) {
            $data=$form->getData();

            $user->setPassword($passEncoder->encodePassword($user,$data['password']));
            
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            // Envoyer un mail à l'utilisateur en lui envoyant $tempPassword
            
            $session=$request->getSession();
            $session->getFlashBag()->add('message','Votre nouveau mot de passe a bien été enregistré');
            $session->set('statut','warning');

            return $this->redirect($this->generateUrl('oubliRegister', array('id' => $id, 'session' => $session)));
        }
        $session="";

        return $this->render('register/oubliRegister.html.twig', [
            
            'form_register'=>$form->createView(),
            'session' => $session
        ]);
    }



    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');

    }
}
