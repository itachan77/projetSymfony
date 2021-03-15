<?php

namespace App\Controller\espaceController;

use App\Entity\User;
use App\Entity\Eleve;
use App\Entity\Groupe;
use App\Form\EleveType;
use App\Entity\Calendar;
use App\Entity\Fichiers;
use App\Form\GroupeType;
use App\Form\ProfAdType;
use App\Form\MdpProfType;
use App\Entity\Professeur;
use App\Form\CalendarType;
use App\Form\FichiersType;
use App\Form\ProfEspaceType;
use App\Form\ProfesseurType;
use App\Form\ProfFichierType;
use App\Repository\MailRepository;
use App\Repository\UserRepository;
use App\Repository\EleveRepository;
use App\Repository\GroupeRepository;
use App\Repository\CalendarRepository;
use App\Repository\FichiersRepository;
use App\Repository\CategorieRepository;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



/** @Route("/professeur") 
 * 
 * @Security("is_granted('ROLE_ADMIN','ROLE_PROFESSEUR','ROLE_USER')")
 */ 
class ProfController extends AbstractController
{
    /**
     * @Route("/espace/{id}", name="accueil_professeur")
     */
    public function espace ($id, UserRepository $userRepository, MailRepository $mailRepository): Response
    {
        $em=$this->getDoctrine()->getManager();
        $profRepository=$em->getRepository(Professeur::class);
        
        //A partir de l'id user du professeur, je recherche son enregistrement correspondant
        //dans la table User
        $UserProf = $userRepository->find($id);

        //A partir de la fiche utilisateur du professeur, j'accède à ses mails
        //Impossible vide
            $sonMail=$UserProf->getMails();

        //autre solution 
        //$sonMail=$mailRepository->find();



        //A partir de l'enregistrement du professeur, je peux retrouver son id de la table
        //Professeur (à partir duquel la connexion à son espace professeur est possible)
        $idProf=$UserProf->getProfesseur()->getId();
        $professeur=$profRepository->find($idProf);
        $username=$professeur->getUser()->getUsername();

        $nom=$professeur->getNomProf();
        $prenom=$professeur->getPrenomProf();
        $photo=$professeur->getPhotoProf();
        
        return $this->render('professeur/espace/PageIndex.html.twig', [
            'email' => $username,
            'nom' => $nom,
            'prenom' => $prenom,
            'photo' => $photo,
            'professeur' => $professeur,
            'userProf' => $UserProf,
            'sonMail' => $sonMail
        ]);
    }

    /**
     * @Route("/espace/PageCompte/{id}", name="PageCompte")
     */
    public function compte_professeur ($id, Request $request,UserPasswordEncoderInterface $passEncoder): Response
    {
        $em=$this->getDoctrine()->getManager();
        $profRepository=$em->getRepository(Professeur::class);
        $professeur=$profRepository->find($id);
        $username=$professeur->getUser()->getUsername();
        $user=$professeur->getUser();
        $session="";

        $img=$professeur->getPhotoProf();
        $formProf=$this->createForm(ProfEspaceType::class,$professeur);

        
        $formProf
        ->add('modifier', SubmitType::class, ['label'=>'Valider la modification']);
        //en règle générale, pour la gestion du mot de passe, il faut que ce mdp soit assez long sinon erreur
        //lors de l'authentification
        $formProf['user']['password']->setData(''); //enlève les données du mot de passe dans le formulaire pour que le champs
        //password soit vide.
        $formProf->handleRequest($request);

        if ($request->isMethod('post') && $formProf->isValid())
            {

                $mdpMod=$formProf['user']['password']->getData();
                $user->setPassword($passEncoder->encodePassword($user,$mdpMod));
                $em->persist($user);
                $em->flush();

                $file=$formProf['photoProf']->getData();

                if(!is_string($file)) 
                {
                    $filename=$file->getClientOriginalName();
                    $file->move($this->getParameter('emplacement_image_professeurs'),
                    $filename);
                    $professeur->setPhotoProf($filename);
                }

                else 
                {
                    $professeur->setPhotoProf($img);
                }

                $em->persist($professeur);
                $em->flush();
                $session=$request->getSession();
                $session->getFlashBag()->add('message','Les modifications ont bien été prises en compte');
                $session->set('statut','warning');

            }

        return $this->render('professeur/espace/PageCompte.html.twig', [
            'professeur' => $professeur,
            'form_update' => $formProf->createView(),
            'session' => $session
        ]);

    }

    /**
     * @Route("/espace/PageEleves/{id}", name="PageEleves")
     */
    public function eleves_professeur ($id, Request $request, EleveRepository $eleveRepository, GroupeRepository $groupeRepository): Response
    {
        $em=$this->getDoctrine()->getManager();
        $profRepository=$em->getRepository(Professeur::class);
        $professeur=$profRepository->find($id);
        $groupe=new Groupe;
        $vuGroupe="";
        
        $formGroup=$this->createForm(GroupeType::class,$groupe);

        $formGroup
        ->add('Valider', SubmitType::class, ['label'=>'Créer ce groupe']);
        $formGroup->handleRequest($request);

        if ($request->isMethod('post') && $formGroup->isValid()){
            $professeur->addGroupe($groupe);
            
            $em->persist($groupe);
            $em->flush();
            $em->persist($professeur);
            $em->flush();
        }
        
        $vuGroupe=$professeur->getGroupe();

        return $this->render('professeur/espace/PageEleves.html.twig', [
            'id' => $id,
            'professeur' => $professeur,
            'form_insert' => $formGroup->createView(),
            'vuGroupe' => $vuGroupe,
            'eleves' => $eleveRepository->findAll(),
        ]);

    }


    /**
     * @Route("/espace/PageEleves/{id}/EditGroupe/", name="EditGroupe")
     */
    public function EditGroupe ($id, Request $request, EleveRepository $eleveRepository, GroupeRepository $groupeRepository): Response
    {
        $em=$this->getDoctrine()->getManager();
        $profRepository=$em->getRepository(Professeur::class);
        $professeur=$profRepository->find($id);
        $groupe=new Groupe;
        $vuGroupe="";
        
        $formGroup=$this->createForm(GroupeType::class,$groupe);

        $formGroup
        ->add('Valider', SubmitType::class, ['label'=>'Créer ce groupe']);
        $formGroup->handleRequest($request);

        if ($request->isMethod('post') && $formGroup->isValid()){
            $professeur->addGroupe($groupe);
            $em->persist($groupe);
            $em->flush();
            $em->persist($professeur);
            $em->flush();
        }
        
        $vuGroupe=$professeur->getGroupe();

        return $this->render('professeur/espace/PageEleves.html.twig', [
            'id' => $id,
            'professeur' => $professeur,
            'form_insert' => $formGroup->createView(),
            'vuGroupe' => $vuGroupe,
            'eleves' => $eleveRepository->findAll(),
        ]);

    }


    /**
     * @Route("/espace/PageEleves/{id}/ajoutEleveGroupe/{idGroupe}", name="ajoutEleveGroupe")
     */
    public function ajoutEleveGroupe (Request $request, $id, EleveRepository $eleveRepository,ProfesseurRepository $profRepository, GroupeRepository $groupeRepository,$idGroupe): Response
    {
        $em=$this->getDoctrine()->getManager();
        $profRepository=$em->getRepository(Professeur::class);
        $professeur=$profRepository->find($id);

        $vuGroupe="";

        $groupe=$groupeRepository->find($idGroupe);
        
        if ($request->isMethod('post') && isset($_POST['eleveSelect'])){
            //J'associe le groupe à plusieurs élèves et ce dynamiquement
            for ($a=0;$a<count($_POST['eleveSelect']);$a++){
                

                $eleve=$eleveRepository->find($_POST['eleveSelect'][$a]);
                $groupe->addElefe($eleve);
                $em->persist($groupe);
                $em->flush();
                $em->persist($professeur);
                $em->flush();
                $effectue='effectué';
            }
        }

        else {
            $effectue='pas effectué';
        }

        return $this->redirectToRoute('PageEleves', array('id'=>$id));
    }


    /**
     * @Route("/espace/PageEleves/{id}/deleteEleveGroupe/{idGroupe}/{idEleve}", name="deleteEleveGroupe")
     */
    public function deleteEleveGroupe (Request $request, $id, $idEleve,EleveRepository $eleveRepository,ProfesseurRepository $profRepository, GroupeRepository $groupeRepository,$idGroupe): Response
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $groupe=$groupeRepository->find($idGroupe);
        $professeur=$professeurRepository->find($id);
        $eleve=$eleveRepository->find($idEleve);

        $groupe->removeElefe($eleve);
        $em->persist($groupe);
        $em->flush();

        return $this->redirectToRoute('PageEleves', array('id'=>$id));
    }


    /**
     * @Route("/espace/PageEleves/{id}/delete/{idGroupe}", name="groupe_delete")
     */
    public function groupeDelete(Request $request, $id, ProfesseurRepository $professeurRepository, GroupeRepository $groupeRepository,$idGroupe): Response
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $groupe=$groupeRepository->find($idGroupe);
        $professeur=$professeurRepository->find($id);
        $professeur->removeGroupe($groupe);
        $em->persist($groupe);
        $em->flush();

        return $this->redirectToRoute('PageEleves', array('id'=>$id));
    }



    /**
     * @Route("/espace/PageMdp/{id}", name="PageMdp")
     */
    public function pageMdp ($id, Request $request,UserPasswordEncoderInterface $passEncoder): Response
    {
        $em=$this->getDoctrine()->getManager();
        $profRepository=$em->getRepository(Professeur::class);
        $professeur=$profRepository->find($id);
        $user=$professeur->getUser();

        $formMdp=$this->createForm(MdpProfType::class,$user);
        
        $session="";
        $formMdp
        ->add('modifier', SubmitType::class, ['label'=>'Modifier le mot de passe']);

        $formMdp->handleRequest($request);

        if ($request->isMethod('post') && $formMdp->isValid()) {
            //A retenir, plusieurs minutes de recherche (pour un getData) avec relations
            $mdpMod=$formMdp['password']->getData();
            $user
            ->setPassword($passEncoder->encodePassword($user,$mdpMod));
            $em->persist($user);
            $em->flush();

            $session=$request->getSession();
            $session->getFlashBag()->add('message','Votre mot de passe a bien été modifié');
            $session->set('statut','warning');

        }

        return $this->render('professeur/espace/PageMdp.html.twig', [
            'professeur' => $professeur,
            'formMdp' => $formMdp->createView(),
            'session' => $session
        ]);
    }

    /**
     * @Route("/espace/PageCalend/{id}", name="PageCalend")
     */
    public function Calend ($id, Request $request, GroupeRepository $groupeRepository,ProfesseurRepository $profRepository): Response
    {
        $professeur=$profRepository->find($id);
        
        $events=$professeur->getCalendrier();

        $groupe=$professeur->getGroupe();


        //$events=$calendar->findAll();
        // dd($events) : instruction à retenir absolument: permet de voir le contenu de nos objets :  


        $rdvs = [];
        foreach($events as $val) {
            $rdvs[]=[
                'id'=>$val->getId(),
                'start'=>$val->getStart()->format('Y-m-d H:i:s'),
                'end'=>$val->getEnd()->format('Y-m-d H:i:s'),
                'title'=>$val->getTitle(),
                'description'=>$val->getDescription(),
                'backgroundColor'=>$val->getBackgroundColor(),
                'borderColor'=>$val->getBorderColor(),
                'textColor'=>$val->getTextColor(),
                'allDay' =>$val->getAllDay(),];
        }
        
        //un nouvel enregistrement de rendez-vous
        $calend=new Calendar;

        $form_insert=$this->createForm(CalendarType::class,$calend);
        $form_insert
        ->add('Ajouter', SubmitType::class, array('label'=>'Ajouter un rendez-vous'));
        $form_insert->handleRequest($request);

        if (isset($_POST['calendar']) ) {
            
            $em=$this->getDoctrine()->getManager();

            $professeur->addCalendrier($calend);
            
            $em->persist($calend);
            $em->flush();
            
            
            for ($a=0;$a<count($_POST['calendar']['groupe']);$a++) {
                
                
                $groupe=$groupeRepository->find($_POST['calendar']['groupe'][$a]);
                $calend->addGroupe($groupe);
    
                $em->persist($calend);
                $em->flush();
    
                $em->persist($groupe);
                $em->flush();
            }
            
            $em->persist($professeur);
            $em->flush();
            return $this->redirectToRoute('PageCalend', array('id'=>$id));
        }

        

        $data = json_encode($rdvs);

        return $this->render('professeur/espace/PageCalend.html.twig', [
            'form_insert' => $form_insert->createView(),
            'data' => $data,
            'professeur' => $professeur,
            'groupe' => $groupe,
            'calendrier' => $events
            
        ]);
    }


    /**
     * @Route("/espace/PageCalend/{id}/delete/{idCalend}", name="calend_delete")
     */
    public function calendDelete($id, CalendarRepository $calendarRepository,ProfesseurRepository $professeurRepository, FichiersRepository $fichierRepository,$idCalend): Response
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $calendar=$calendarRepository->find($idCalend);
        $professeur=$professeurRepository->find($id);
        $professeur->removeCalendrier($calendar);
        $em->persist($calendar);
        $em->flush();

        return $this->redirectToRoute('PageCalend', array('id'=>$id));
        
    }


    /**
     * @Route("/espace/PageVideos/{id}", name="PageVideos")
     */
    public function PageVideos ($id, ProfesseurRepository $profRepository, Eleve $eleves, EleveRepository $eleveRepository): Response
    {
        $professeur=$profRepository->find($id);
        $username=$professeur->getUser()->getUsername();

        $nom=$professeur->getNomProf();
        $prenom=$professeur->getPrenomProf();
        $photo=$professeur->getPhotoProf();

        //return $this->render('professeur/espace/calendProf.html.twig',compact('data'));

        return $this->render('professeur/espace/PageVideos.html.twig', [
            'professeur' => $professeur,
            'eleves' => $eleveRepository->findAll(),
        ]);
        
    }


    /**
     * @Route("/espace/PageDocuments/{id}", name="PageDocuments")
     */
    public function PageDocuments (Request $request,$id, FichiersRepository $fichiersRepository): Response
    {
        $em=$this->getDoctrine()->getManager();
        $ProfesseurRepository=$em->getRepository(Professeur::class);
        $professeur=$ProfesseurRepository->find($id);
        $fichiers=$professeur->getFichiers();

        $fichier = new Fichiers();

        $form_insert=$this->createForm(FichiersType::class,$fichier);

        $form_insert
        ->add('Ajouter', SubmitType::class, array('label'=>'Ajouter un nouveau document'));

        $form_insert->handleRequest($request);

        if ($form_insert->isSubmitted() && $form_insert->isValid()) {
            
            $em=$this->getDoctrine()->getManager();
            $file=$form_insert['fichier']->getData();

            if(!is_string($file)) {
                $filename=$file->getClientOriginalName();
                $file->move($this->getParameter('emplacement_docs'),
                $filename);
                $fichier->setFichier($filename);
                $professeur->addFichier($fichier);
            }

            else 
            {
                return $this->redirect($this->generateUrl('PageDocuments', array('id'=>$id)));
            }
            
            $em->persist($fichier);
            $em->flush();
            $em->persist($professeur);
            $em->flush();

            return $this->redirectToRoute('PageDocuments', array('id'=>$id));
        }
        
        return $this->render('professeur/espace/PageDocuments.html.twig', [
            'fichier' => $fichier,
            'fichiers' => $fichiers,
            'form_insert' => $form_insert->createView(),
            'professeur' => $professeur
        ]);
    }


    /**
     * @Route("/espace/PageDocuments/{id}/delete/{idDoc}", name="fichiers_delete")
     */
    public function fichiersDelete(Request $request, Fichiers $fichier, $id, ProfesseurRepository $professeurRepository, FichiersRepository $fichierRepository,$idDoc): Response
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $fichier=$fichierRepository->find($idDoc);
        $professeur=$professeurRepository->find($id);
        $professeur->removeFichier($fichier);
        $em->persist($fichier);
        $em->flush();

        return $this->redirectToRoute('PageDocuments', array('id'=>$id));
        
    }


    /**
     * @Route("/espace/{id}/delete/categorie/{Idcat}/", name="EspProfCatDel")
     */
    public function categorie_delete(Request $request, $Idcat, $id, CategorieRepository $categorieRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        
        //l'id représente l'id de la categorie.
        $categorie=$categorieRepository->find($Idcat);
        
        //l'id du professeur était nécessaire pour trouver le professeur liée à la catégorie
        // que je veux supprimer dans la page de modification du professeur.
        $professeur=$professeurRepository->find($id);
        
        //la méthode removeCategory générée automatiquement par symfony me permet de supprimer
        //la catégorie liée au professeur
        $professeur->removeCategory($categorie);
        
        $em->persist($categorie);
        $em->flush();

        return $this->redirect($this->generateUrl('accueil_professeur', array('id'=>$id)));
    }

    /**
     * @Route("/espace/{id}/delete/eleve/{Idele}", name="EspProfEleDel")
     */
    public function eleve_delete(Request $request, $id, $Idele, EleveRepository $eleveRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        
        //l'Idele représente l'id de l'élève.
        $eleve=$eleveRepository->find($Idele);

        //l'id du professeur était nécessaire pour trouver le professeur liée à l'élève
        // que je veux supprimer dans la page de modification du professeur, $idprof
        $professeur=$professeurRepository->find($id);
        
        //la méthode removeCategory générée automatiquement par symfony me permet de supprimer
        //la catégorie
        $professeur->removeElefe($eleve);
        
        $em->persist($eleve);
        $em->flush();

        return $this->redirect($this->generateUrl('accueil_professeur', array('id'=>$id)));
    }


    /**
     * @Route("/admin/voirEspaceProf/{idEspace}", name="voirEspaceProf")
     */

    public function voirEspace($idEspace, ProfesseurRepository $professeurRepository) {

        $lespProfesseur=$professeurRepository->find($idEspace);
        $idUser=$lespProfesseur->getUser()->getId();

        return $this->redirect($this->generateUrl('accueil_professeur', array(
            'id' => $idUser,
        )));

    }




    /**
     * @Route("/data", name="JsonPage")
     */
    public function JsonPage (EleveRepository $eleveRepository, ProfesseurRepository $profRepository): Response
    {
        //lien : http://127.0.0.1:8000/monjson
        $eleve=$eleveRepository->findAll();

        // dd($events) : instruction à retenir absolument: permet de voir le contenu de nos objets :
        $tabeleve = [];

        foreach($eleve as $val) {
            
            $tabeleve[]=[
                'id'=>$val->getId(),
                'nom'=>$val->getNomEleve(),
                'prenom'=>$val->getPrenomEleve(),
                'adresse'=>$val->getAdresseEleve(),
                'email'=>$val->getEmailEleve()
            ];
        }

        $data = json_encode($tabeleve);

        //return $this->render('professeur/espace/calendProf.html.twig',compact('data'));
        return new Response($data);
        /*
        return $this->render('professeur/espace/PageCalend.html.twig', [
            'data' => $data,
            'professeur' => $professeur,
            'calendars' => $calendar->findAll(),
        ]);
        */
    }


    /**
     * @Route("/vueVierge", name="vueVierge")
     */
    public function vueVierge(Request $request)
    {
        //http://127.0.0.1:8000/vueVierge

        return $this->render('vueVierge.html.twig');
        
    }



}
