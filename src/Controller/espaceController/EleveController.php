<?php

namespace App\Controller\espaceController;

use App\Entity\User;
use App\Entity\Eleve;
use Twig\Environment;
use App\Form\UserModType;
use App\Entity\Professeur;
use App\Form\EleveEspaceRensType;
use App\Repository\EleveRepository;
use App\Repository\GroupeRepository;
use App\Repository\CalendarRepository;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/** @Route("/eleve") 
 * 
 * @Security("is_granted('ROLE_ADMIN','ROLE_ELEVE','ROLE_USER')")
 */ 
class EleveController extends AbstractController
{
    /**
     * @Route("/lien", name="react/eleve")
     */
    public function react()
    {
        return $this->render('react/index.html.twig');
    }


    /**
     * @Route("/espace/{id}", name="accueil_eleve")
     */

    public function index($id): Response
    {
        
        //la page d'espace élève doit être affichée à partir des données de la table
        //user et non de la table eleve. 

        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        //Connexion à l'espace élève à partir de la table User (très recommandée)
        //avec utilisation comme seule variable de $unUser qu'on utilisera pour 
        //accéder à toutes les données de l'User, y compris à sa table associée Eleve
        

        $unUser=$userRepository->find($id);

        $sonMail=$unUser->getMails();

        $leleve=$unUser->getEleve();

        //Connexion à l'espace élève à partir de la table User (très recommandée)
        // $login=$unUser->getUserName();
        // $nom=$unUser->getEleve()->getNomEleve();
        // $prenom=$unUser->getEleve()->getPrenomEleve();
        // $photo=$unUser->getEleve()->getPhotoEleve();
        // $adresse=$unUser->getEleve()->getAdresseEleve();


        //Connexion à l'espace élève à partir de la table élève (non recommandée)
        //Pour enlever, on a donc enlevé Eleve $uneleve dans les paramètres de la fonction
        // $login=$uneleve->getUser()->getUserName();        
        // $nom=$uneleve->getNomEleve();
        // $prenom=$uneleve->getPrenomEleve();
        // $photo=$uneleve->getPhotoEleve();
        
        return $this->render('eleve/espace/pageIndex.html.twig', [
            'user' => $unUser,
            'sonMail' => $sonMail,
            'leleve' => $leleve,

        ]);
    }

    /**
     * @Route("/espace/PageCompte/{id}", name="PageCompteEleve")
     */

    public function PageCompteEleve(Request $request, $id, UserPasswordEncoderInterface $passEncoder): Response
    {
        $session="";
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $unUser=$userRepository->find($id);
        $eleve=$unUser->getEleve();

        $formEleve=$this->createForm(UserModType::class,$unUser);

        $formEleve
        ->add('modifier', SubmitType::class, ['label'=>'Valider la modification']);
        //en règle générale, pour la gestion du mot de passe, il faut que ce mdp soit assez long sinon erreur
        //lors de l'authentification
        $formEleve['password']->setData(''); //enlève les données du mot de passe dans le formulaire pour que le champs
        //password soit vide.
        $formEleve->handleRequest($request);

        if ($request->isMethod('post') && $formEleve->isValid())
            {
                $mdpMod=$formEleve['password']->getData();
                $unUser->setPassword($passEncoder->encodePassword($unUser,$mdpMod));
                $em->persist($unUser);
                $em->flush();

                $session=$request->getSession();
                $session->getFlashBag()->add('message','Les modifications ont bien été prises en compte');
                $session->set('statut','warning');
            }
        
        return $this->render('eleve/espace/pageCompte.html.twig', [
            'user' => $unUser,
            'eleve' => $eleve,
            'form_update' => $formEleve->createView(),
            'session' => $session
        ]);
    }


    /**
     * @Route("/espace/PageRsgt/{id}", name="PageRensEleve")
     */

    public function PageRensEleve(Request $request, $id, UserPasswordEncoderInterface $passEncoder): Response
    {
        $session="";
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $unUser=$userRepository->find($id);
        
        //Accès aux données de la base de données élèves grace à $unUser et à sa méthode getEleve
        $eleve=$unUser->getEleve();
        $img=$unUser->getEleve()->getPhotoEleve();

        $formEleve=$this->createForm(EleveEspaceRensType::class,$eleve);

        $formEleve
        ->add('modifier', SubmitType::class, ['label'=>'Valider la modification']);

        $formEleve->handleRequest($request);

        if ($request->isMethod('post') && $formEleve->isValid())
            {

                $file=$formEleve['photoEleve']->getData();

                if(!is_string($file)) {
                    $filename=$file->getClientOriginalName();
                    $file->move($this->getParameter('emplacement_image'),
                    $filename);
                    $eleve->setPhotoEleve($filename);
                }

                else {
                    $eleve->setPhotoEleve($img);
                }

                $em->persist($eleve);
                $em->flush();
                $session=$request->getSession();
                $session->getFlashBag()->add('message','Les modifications ont bien été prises en compte');
                $session->set('statut','warning');
            }
        
        return $this->render('eleve/espace/pageRsgt.html.twig', [
            'user' => $unUser,
            'eleve' => $eleve,
            'form_update' => $formEleve->createView(),
            'session' => $session
            
        ]);
    }

    /**
     * @Route("/espace/PageProf/{id}", name="PageProfEleve")
     */

    public function PageProfEleve($id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $unUser=$userRepository->find($id);
        
        //Accès aux données de la base de données élèves grace à $unUser et à sa méthode getEleve
        $eleve=$unUser->getEleve();
        
        return $this->render('eleve/espace/pageProf.html.twig', [
            'user' => $unUser,
            'eleve' => $eleve,
            
        ]);
    }

    /**
     * @Route("/espace/PageDoc/{id}", name="PageDocEleve")
     */

    public function PageDocEleve(Request $request, $id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $unUser=$userRepository->find($id);
        
        //Accès aux données de la base de données élèves grace à $unUser et à sa méthode getEleve
        $eleve=$unUser->getEleve();
        $sonProf=$unUser->getEleve()->getProfesseur();
        
        
        return $this->render('eleve/espace/pageDoc.html.twig', [
            'user' => $unUser,
            'eleve' => $eleve,
            'sonProf' => $sonProf,
            
        ]);
    }

    /**
     * @Route("/espace/PageAgenda/{id}", name="PageAgendaEleve")
     */
    public function PageAgendaEleve ($id, GroupeRepository $groupeRepository, ProfesseurRepository $professeurRepository, Request $request, CalendarRepository $calendRepository): Response
    {
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $unUser=$userRepository->find($id);
        $sonProf=$unUser->getEleve()->getProfesseur();

        $eleve=$unUser->getEleve();
        $groupe=$eleve->getGroupe();

        //je dois renseigner le groupe dans lequel se trouve l'élève
        //sinon, ne marchera pas car la machine ne sait pas quel calendrier de 
        //groupe choisir. Il faut donc obligatoirement  préciser l'indice du 
        //tableau getGroupe

        //$evets=$eleve->getGroupe()[0]->getCalendars();
        //$evets2=$eleve->getGroupe()[1]->getCalendars();


        //méthode magique : findByDescription('winzou')
        //$events=$calendRepository->findBy(array('title' => $mavar ));

        //$event=$calendRepository->findBytitle('seul ingalls olivier');

        for ($i=0;$i<(count($eleve->getGroupe()));$i++) { 
            $events=$eleve->getGroupe()[$i]->getCalendars();
        }
        // dd($events) : instruction à retenir absolument: permet de voir le contenu de nos objets :  
        
        //Un samedi entier de gaché, mais enfin trouvé !!!
        $rdvs = [];
        for ($i=0;$i<(count($eleve->getGroupe()));$i++) { 

            foreach($eleve->getGroupe()[$i]->getCalendars() as $val) {
                $rdvs[]=[
                    'id'=>$val->getId(),
                    'start'=>$val->getStart()->format('Y-m-d H:i:s'),
                    'end'=>$val->getEnd()->format('Y-m-d H:i:s'),
                    'title'=>$val->getTitle(),
                    'description'=>$val->getDescription(),
                    'backgroundColor'=>$val->getBackgroundColor(),
                    'borderColor'=>$val->getBorderColor(),
                    'textColor'=>$val->getTextColor(),
                    'allDay' =>$val->getAllDay(),
                ];
            }
            
        }
    
        $data = json_encode($rdvs);
        return $this->render('eleve/espace/pageAgenda.html.twig', [
            'user' => $unUser,
            'eleve' => $eleve,
            'sonProf' => $sonProf,
            'groupe' => $groupe,
            'data' => $data,
        ]);
    }


    /**
     * @Route("/admin/voirEspaceEleve/{idEspace}", name="voirEspaceEleve")
     */

    public function voirEspace($idEspace,EleveRepository $eleveRepository, ProfesseurRepository $professeurRepository,Request $request)

    {
        $lespEleve=$eleveRepository->find($idEspace);
        $idUser=$lespEleve->getUser()->getId();

        return $this->redirect($this->generateUrl('accueil_eleve', array(
            'id' => $idUser,
        
        )));

    }



    /**
     * @Route("/route/{id}", name="route_particulier")
     */

    public function show(Environment $twig, Eleve $uneleve, EleveRepository $eleveRepository, Request $request)

    {
        if($request->isMethod('post') && isset($_POST['direleve']))
        {
            $ident=$_POST['leleve'];

            return $this->redirect($this->generateUrl('route_particulier', array('id' => $ident)));

            // ('route_particulier', {id: eleve.id})
            //$ident=$request->query->get('leleve');
        }
        else 
        $action="";


        return new Response($twig->render('eleve/show.html.twig', 
        [
            'eleves' => $eleveRepository->findAll(),
            'uneleve' => $uneleve,
            'action' => $action
        ]));
    }





}
