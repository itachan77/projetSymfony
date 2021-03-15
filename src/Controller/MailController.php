<?php
/*****************************************************ENVOI DE MAIL*************************************************************** */
namespace App\Controller;

use App\Entity\User;
use App\Entity\Eleve;
use App\Entity\Contact;
use App\Entity\Professeur;
use App\Repository\EleveRepository;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MailController extends AbstractController
{

    /**
     * @Route("/fromscuola/contact/", name="mail_scuola_contact_form")
     */
    public function mail_scuola_contact_form(\Swift_Mailer $mailer, Request $request)
    {

        // $em=$this->getDoctrine()->getManager();
        // $contactRepository=$em->getRepository(Contact::class);
        // $contacts=$contactRepository->findAll();

        if($request->isMethod('post'))
        {
            //1- je récupère chaque valeur d'input saisie dans le formulaire de contact du site  lascuola que je stocke dans une 
            //variable, chaque information saisie dans cet input pourra donc être visible dans le mail de raphael  

            //2- j'envoie à Raphael via son mail chaque info venant du visiteur qui a rempli le formuulaire 

            // 1 --------
            $titre=$_POST['contact[titreContact]'];
            $nom=$_POST['contact[nomContact]'];
            $prenom=$_POST['contact[prenomContact]'];

            $mail=$_POST['contact[emailContact]'];
            $age=$_POST['contact[ageContact]'];
            $messageVisiteur=$_POST['contact[messageContact]'];

            // 2 -------- il faudra mettre plus tard dans le message : cliquez ici pour répondre (mène vers une route symfony qui stocke la réponse en base)
            $objet="Vous avez reçu un nouveau message depuis votre site la-scuola.fr";
            $from="itachan27@gmail.com";

            $message=(new \Swift_Message($objet))
            ->setFrom($from)
            ->setTo('itachan77@orange.fr')
            ->setBody(
                $this->renderView(
                    'contact/mail_scuola_contact.html.twig',[
                        'titre' => $titre,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'mail' => $mail,
                        'age' => $age,
                        'messageVisiteur' => $messageVisiteur,
                    ]),
                    'text/html'
                );
                
            $mailer->send($message);

            return $this->redirect($this->generateUrl('scuola_contact'));

        }

    }



    /**
     * @Route("/mail/{id}", name="mail")
     */
    public function index(\Swift_Mailer $mailer, $id, Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleve=$eleveRepository->find($id);

        if($request->isMethod('post') && isset($_POST['envoiMail']))
        {
            
            if ($_POST['from']!="")
            {
            $de=$_POST['from'];
            }
            else $de=" ";

            if ($_POST['a']!="")
            {
            $a=$_POST['a'];
            }
            else $a=" ";

            if ($_POST['objet']!="")
            {
            $objet=$_POST['objet'];
            }
            else $objet=" ";


            if ($_POST['message']!="")
            {
            $lemessage=$_POST['message'];
            }
            else $lemessage=" ";


            $message=(new \Swift_Message($objet))
            ->setFrom($de)
            ->setTo($a)
            ->setBody(
                $this->renderView(
                    'email/envoi_mail.html.twig',[
                        'messageAenvoyer' => $lemessage
                    ]),
                    'text/html'
                );
                
            $mailer->send($message);
    
            return new Response('message envoyé');
        }

        return $this->render('email/show_boiteMail.html.twig', [
            'eleves' => $eleveRepository->findAll(),
            'uneleve' => $eleve,
        ]);

    }




    /**
     * @Route("/mailer/show_boiteMail", name="show_boiteMail")
     */
    public function show_boiteMail()
    {
        return $this->render('email/show_boiteMail.html.twig' 
    );
    }

    
    /**
     * @Route("/mailer/envoiComptes/eleve", name="envoiComptes")
     */
    public function plusieurs_envoiCompte_ele(\Swift_Mailer $mailer, Request $request, UserPasswordEncoderInterface $passEncoder)
    {

        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        
        // En bas, $eleve est simplement un banal array vérifiable avec indice numérique
        $eleve=$eleveRepository->findBy(['selectEleve'=>true]);
        
        // si je veux récupérer le mail du tableau $eleve pas à pas
        $rst = $eleve[0]->getEmailEleve();

        // si je veux récupérer les mail selon une recherche spécifique (findBy) 
        // ou dans tout le repository : 
        for ($i=0;$i<count($eleve);$i++)
        {
            //Création du compte utilisateur. 
            //Le mot de passe aléatoire généré est encodé et nous demanderons à l'utilisateur
            //de changer son mot de passe dès qu'il se sera connecté une première fois 
            // pour une question de sécurité.

            $user=new User;
            $user
            ->setUsername($eleve[$i]->getEmailEleve())
            ->setEleve($eleve[$i]);

            $mdpAleatoire=$this->randomPassword();
            $user
            ->setRoles(['ROLE_USER'])
            ->setPassword($passEncoder->encodePassword($user,$mdpAleatoire));
            $em->persist($user);
            $em->flush();


        
        // tableau de type par exemple $a=['itachan77@orange.fr','itachan77@hotmail.com'];
        // pour info (et très pratique) on peut mettre un tableau avec indices avec des email
        // pour envoyer des email (to)
        $a=$eleve[$i]->getEmailEleve();
        $de="itachan2701@gmail.com";
        $objet="Espace Scuola - Inscription";

        $lemessage='
        Chère '.$eleve[$i].', <br> Vous êtes à présent inscrit sur Espace Scuola. <br>
        Identifiant : '.$eleve[$i]->getEmailEleve().' <br>
        Mot de passe : '.$mdpAleatoire.' <br>
        L\'adresse de l\'espace SCUOLA est : http://adresse.com <br>
        En cas de problème, n\'hésitez pas à nous contacter. <br>
        Cordialement, <br>
        Administrateur : LA SCUOLA <br>
        Tel : 0601487734 <br>
        Email : itachan2701@gmail.com.
        ';

        $message=(new \Swift_Message($objet))
        ->setFrom($de)
        ->setTo($a)
        ->setBody($lemessage,

                'text/html'
            );

        $mailer->send($message);

        }

            return new Response('messages envoyés');

    }


    /**
     * @Route("/mailer/envoiComptes/professeur", name="envoiComptesProf")
     */
    public function plusieurs_envoiCompte_prof(\Swift_Mailer $mailer, Request $request, UserPasswordEncoderInterface $passEncoder)
    {

        $em=$this->getDoctrine()->getManager();
        $profRepository=$em->getRepository(Professeur::class);
        
        // En bas, $professeur est simplement un banal array vérifiable avec indice numérique
        $professeur=$profRepository->findBy(['selectProf'=>true]);
        
        // si je veux récupérer le mail du tableau $professeur pas à pas
        $rst = $professeur[0]->getEmailProf();

        // si je veux récupérer les mail selon une recherche spécifique (findBy) 
        // ou dans tout le repository : 
        for ($i=0;$i<count($professeur);$i++)
        {
            //Création du compte utilisateur. 
            //Le mot de passe aléatoire généré est encodé et nous demanderons à l'utilisateur
            //de changer son mot de passe dès qu'il se sera connecté une première fois 
            // pour une question de sécurité.

            $user=new User;
            $user
            ->setUsername($professeur[$i]->getEmailProf())
            ->setProfesseur($professeur[$i]);

            $mdpAleatoire=$this->randomPassword();
            $user
            ->setRoles(['ROLE_PROFESSEUR'])
            ->setPassword($passEncoder->encodePassword($user,$mdpAleatoire));
            $em->persist($user);
            $em->flush();

        // tableau de type par exemple $a=['itachan77@orange.fr','itachan77@hotmail.com'];
        // pour info (et très pratique) on peut mettre un tableau avec indices avec des email
        // pour envoyer des email (to)
        $a=$professeur[$i]->getEmailProf();
        $de="itachan2701@gmail.com";
        $objet="Espace Scuola - Inscription";

        $lemessage='
        Bonjour '.$professeur[$i].', <br> Vous êtes à présent inscrit sur Espace Scuola. <br>
        Identifiant : '.$professeur[$i]->getEmailProf().' <br>
        Mot de passe : '.$mdpAleatoire.' <br>
        L\'adresse de l\'espace SCUOLA est : http://adresse.com <br>
        En cas de problème, n\'hésitez pas à nous contacter. <br>
        Cordialement, <br>
        Administrateur : LA SCUOLA <br>
        Tel : 0601487734 <br>
        Email : itachan2701@gmail.com.
        ';

        $message=(new \Swift_Message($objet))
        ->setFrom($de)
        ->setTo($a)
        ->setBody($lemessage, 'text/html');

        $mailer->send($message);

        }

        return new Response('messages envoyés');

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
