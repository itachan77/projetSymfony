<?php

namespace App\Controller\siteScuolaController;


use App\Entity\Slides;
use App\Entity\Contact;
use App\Form\SlidesType;
use App\Form\ContactType;
use App\Form\ContactReponseType;
use App\Repository\EleveRepository;
use App\Repository\SlidesRepository;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{


    /**
     * @Route("/scuola/contact", name="scuola_contact")
     */
    public function contact_form_insert (\Swift_Mailer $mailer, Request $request)
    {
        
        $validation="";

        $contact=new Contact;

        $formulaireContact=$this->createForm(ContactType::class,$contact);

        $formulaireContact
        ->add('Envoyer', SubmitType::class, array('label'=>'Envoyer'));

        $formulaireContact->handleRequest($request);


        //La validation du formulaire 
        if( $request->isMethod('post') && $formulaireContact->isValid() ) 
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

/******************************************ENVOI D'UN MAIL A L'ADMINISTRATEUR******************************************************* */
            //1- je récupère chaque valeur d'input saisie dans le formulaire de contact du site  lascuola que je stocke dans une 
            //variable, chaque information saisie dans cet input pourra donc être visible dans le mail de raphael  
            // https://myaccount.google.com/security


            //2- j'envoie à Raphael via son mail chaque info venant du visiteur qui a rempli le formuulaire 

            // 1 --------
            $titre=$contact->getTitreContact();
            $nom=$contact->getNomContact();
            $prenom=$contact->getPrenomContact();

            $mail=$contact->getEmailContact();
            $age=$contact->getAgeContact();
            $messageVisiteur=$contact->getMessageContact();

            $id=$contact->getId(); //La récupération de l'id est nécessaire pour que l'admistrateur puisse stocké spécifiquement sa réponse
            //à celui qui lui a envoyé un message

            // 2 -------- il faudra mettre plus tard dans le message : cliquez ici pour répondre (mène vers une route symfony qui stocke la réponse en base)
            $objet="Une personne vous a envoyé un message via le formulaire de la-scuola.fr";
            $from="itachan2701@gmail.com";

            $message=(new \Swift_Message($objet))
            ->setFrom($from)
            ->setTo('itachan77@orange.fr')
            ->setBody(
                $this->renderView(
                    'scuola/contact/mail_scuola_contact.html.twig',[
                        'titre' => $titre,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'mail' => $mail,
                        'age' => $age,
                        'id' => $id,
                        'messageVisiteur' => $messageVisiteur,
                    ]),
                    'text/html'
                );
                
            $mailer->send($message);

/******************************************FIN ENVOI D'UN MAIL A L'ADMINISTRATEUR******************************************************* */

// Une URL  

            $validation='<h1 class="bg-warning text-center">Votre message a bien été envoyé</h1>';
    
            return $this->render('scuola/contact/contact.html.twig', [
                'form_insert' => $formulaireContact->createView(),
                'validation' => $validation,
            ]);
        }

        return $this->render('scuola/contact/contact.html.twig', [
            'form_insert' => $formulaireContact->createView(),
            'validation' => $validation,
        ]);


    }


    /**
     * @Route("/scuola/contact/reponse/{id}", name="scuola_contact_réponse")
     */
    public function scuola_contact_réponse (\Swift_Mailer $mailer, Request $request, $id, Contact $contact, ContactRepository $contactRepository,EleveRepository $eleveRepository)
    {

        $em=$this->getDoctrine()->getManager();
        $contactRepository=$em->getRepository(Contact::class);
        $leContact=$contactRepository->find($id);

        $validation='';


        $formulaireReponseContact=$this->createForm(ContactReponseType::class,$leContact);

        $formulaireReponseContact
        ->add('Envoyer', SubmitType::class, array('label'=>'Envoyer'));

        $formulaireReponseContact->handleRequest($request);


        //La validation du formulaire 
        if( $request->isMethod('post') && $formulaireReponseContact->isValid() ) 
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($leContact);
            $em->flush();

            $validation='<h1 class="bg-warning text-center">Votre message a bien été envoyé</h1>';
    
            return $this->render('scuola/contact/scuola_contact_reponse.html.twig', [
                'form_insert' => $formulaireReponseContact->createView(),
                'validation' => $validation,
                'leContact'=> $leContact,
                'eleves' => $eleveRepository->findAll(),
            ]);
        }


        return $this->render('scuola/contact/scuola_contact_reponse.html.twig', [
            'form_insert' => $formulaireReponseContact->createView(),
            'validation' => $validation,

            'leContact'=> $leContact,
            'eleves' => $eleveRepository->findAll(),
        ]);


    }




/**
     * @Route("/scuola/contact/liste", name="scuola_contact_liste")
     */
    public function scuola_contact_liste (ContactRepository $contactRepository, EleveRepository $eleveRepository)
    {
        
        $em=$this->getDoctrine()->getManager();
        $contactRepository=$em->getRepository(Contact::class);
        $contacts=$contactRepository->findAll();



        return $this->render('scuola/contact/liste_scuola_contact.html.twig', [
            'contacts' => $contacts,
            'eleves' => $eleveRepository->findAll(),

        ]);
    }


    /**
     * @Route("/scuola/contact/acces", name="scuola_contact_acces")
     */
    public function scuola_contact_acces (ContactRepository $contactRepository, EleveRepository $eleveRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $contactRepository=$em->getRepository(Contact::class);
        $contacts=$contactRepository->findAll();

        return $this->render('scuola/contact/acces.html.twig', [
            'contacts' => $contacts,
            'eleves' => $eleveRepository->findAll(),
        ]);

    }



}














