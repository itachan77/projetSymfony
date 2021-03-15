<?php

namespace App\Controller\adminController;

use DateTime;
use App\Entity\Mail;
use App\Entity\User;
use App\Entity\Eleve;
use Twig\Environment;
use App\Form\MailType;

use App\Form\UserType;
use App\Form\EleveType;
use App\Entity\Categorie;

use App\Repository\EleveRepository;
use App\Repository\CategorieRepository;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/** @Route("/admin") 
 * 
 * @Security("is_granted('ROLE_ADMIN')")
 */ 
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="route_index")
     */
    public function index(Environment $twig): Response
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $action="";
        $eleve=$eleveRepository->findAll();

        $tabEleve = [];
            foreach($eleve as $val) {
                array_push($tabEleve,$val->getNomEleve().' '.$val->getPrenomEleve());
            }
        return new Response($twig->render('admin/index.html.twig', [
        'eleves' => $eleveRepository->findAll(),
        'action' => $action,
        'nomEleves' => $tabEleve,
        ]));
    }

    /**
     * @Route("/liste", name="route_liste")
     */
    public function liste(Request $request, Environment $twig): Response
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleveAll=$eleveRepository->findAll();
        
        $usersRepository=$em->getRepository(User::class);
        $usersAll=$usersRepository->findAll();
        
        $select=$eleveRepository->findBy(['selectEleve' => true]);
        if( in_array(true, $select) ) {
            $selected='checked';
        }
        else {
            $selected='';
        }

        //Pour que le select option de haut_admin.html.twig fonctionne...
        if($request->isMethod('post') && isset($_POST['direleve']))
        {
            $ident=$_POST['leleve'];
            return $this->redirect($this->generateUrl('accueil_eleve', array('id' => $ident)));
        }

        //si la recherche est activée dans haut_admin.html.twig, pour que la vue attendue s'affiche à partir de la route show_recherche
        if($request->isMethod('post') && isset($_POST['recherche']))
        {
            //Si le nom de l'input de recherche n'est pas vide alors $nom prend la valeur saisie sinon prend la valeur d'un espace.
            if ($_POST['rechnom']!="")
            {
            $nom=$_POST['rechnom'];
            }
            else $nom=" ";

            if ($_POST['rechprenom']!="")
            {
            $prenom=$_POST['rechprenom'];
            }
            else $prenom=" ";
            

            if ($_POST['rechcategorie']!="")
            {
            $category=$_POST['rechcategorie'];
            }
            else $category=" ";

            if ($_POST['rechadresse']!="")
            {
            $adresse=$_POST['rechadresse'];
            }
            else $adresse=" ";

            
            if ($_POST['rechemail']!="")
            {
            $email=$_POST['rechemail'];
            }
            else $email=" ";

            if ($_POST['rechcodepostal']!="")
            {
            $cp=$_POST['rechcodepostal'];
            }
            else $cp=" ";

            return $this->redirect($this->generateUrl('show_recherche', array('nom' => $nom,'prenom' =>$prenom,'adresse' =>$adresse,
            'email' =>$email,'cp' =>$cp)));

        }

        return new Response($twig->render('admin/listeEleves.html.twig', [
            'select' => $selected,
            'eleves' => $eleveAll,
            'users' => $usersAll,
            'nbrst_nom'=>$nbrst_nom=0,
            'nbrst_prenom'=>$nbrst_prenom=0,
            'nbrst_adresse'=>$nbrst_adresse=0,
            'nbrst_email'=>$nbrst_email=0,
            'nbrst_cpville'=>$nbrst_cpville=0,
            'nbrst_category' =>$nbrst_category=0,
            'aucunResultat' => '',
            ]));
    }

    /**
     * @Route("/insert", name="insert")
     */
    public function insert(Request $request, CategorieRepository $CategorieRepository)
    {
        $eleve=new Eleve;
        //$formulaireEleve=$this->createForm(EleveType::class,$eleve);

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $CategorieRepository=$em->getRepository(Categorie::class);
        $listecategory=$CategorieRepository->findAll();

        $eleveRepository=$em->getRepository(Eleve::class);

        $formulaireEleve=$this->createForm(EleveType::class,$eleve);

        // $resultat=[];
        // foreach($listecategory as $val) {
        //     array_push($resultat,$val->getNomcategorie());
        // }

        $formulaireEleve
        ->add('ajouter', SubmitType::class, array('label'=>'Créer'));

        // ->add('Category',ChoiceType::class, [
        //     'choices' =>array_combine($resultat,$resultat)
        //     ]);

        $formulaireEleve->handleRequest($request);

        
        // $CategorieRepository->findAll()

        //Formule très importante pour pouvoir conserver dans la liste déroulante la valeur de la base de données
        // $resultat=[];
        // foreach($listecategory as $val) {
        //     array_push($resultat,$val->getNomcategory());
        // }

        //fonction array_combine très importante pour que ce ne soit pas l'indice qui soit affiché mais la valeur (j'ai mis
        // bcq de temps à trouver)

        // $formulaireEleve->add('category',ChoiceType::class, [
        //     'choices' =>array_combine($resultat,$resultat)
        // ]);


        //si la recherche est activée dans haut_admin.html.twig, pour que la vue attendue s'affiche à partir de la route show_recherche
                //si la recherche est activée dans haut_admin.html.twig, pour que la vue attendue s'affiche à partir de la route show_recherche

        if($request->isMethod('post') && isset($_POST['recherche']))
        {
            //Si le nom de l'input de recherche n'est pas vide alors $nom prend la valeur saisie sinon prend la valeur d'un espace.
            if ($_POST['rechnom']!="")
            {
            $nom=$_POST['rechnom'];
            }
            else $nom=" ";

            if ($_POST['rechprenom']!="")
            {
            $prenom=$_POST['rechprenom'];
            }
            else $prenom=" ";
            

            if ($_POST['rechcategorie']!="")
            {
            $category=$_POST['rechcategorie'];
            }
            else $category=" ";



            if ($_POST['rechadresse']!="")
            {
            $adresse=$_POST['rechadresse'];
            }
            else $adresse=" ";


            if ($_POST['rechemail']!="")
            {
                
            $email=htmlspecialchars($_POST['rechemail']);
            }
            else $email=" ";

            if ($_POST['rechcodepostal']!="")
            {
            $cp=$_POST['rechcodepostal'];
            }
            else $cp=" ";


            return $this->redirect($this->generateUrl('show_recherche', array('nom'=>$nom,'prenom'=>$prenom,'adresse'=>$adresse,
            'email'=>$email,'cp'=>$cp)));

        }

            
        if( $request->isMethod('post') && $formulaireEleve->isValid() ) 
        {
            $em=$this->getDoctrine()->getManager();
            $file=$formulaireEleve['photoEleve']->getData();

            if(!is_string($file)) 
            {
                $filename=$file->getClientOriginalName();
                $file->move($this->getParameter('emplacement_image'),
                $filename);
                $eleve->setPhotoEleve($filename);
            }

            else 
            {
                return $this->redirect($this->generateUrl('insert'));
            }
        
            $em->persist($eleve);
            $em->flush();
            return $this->redirect($this->generateUrl('route_liste'));
        }

        return $this->render('admin/create.html.twig', [
            'eleves' => $eleveRepository->findAll(),
            'form_insert' => $formulaireEleve->createView(),
            'tabCategorie' => $listecategory,
            'action' => '',
            'uneleve' => $eleve,
        ]);

    }

/*********************************************************UPDATE******************************************************************/

    /**
     * @Route("/transition/{idprof}", name="transition")
     */
    public function transition(Request $request, $id, $idprof, Eleve $eleve, ProfesseurRepository $professeurRepository, Eleve $uneleve)
    {
        //Récupération de la liste de professeur
        $listeprofesseur=$professeurRepository->findAll();

        return $this->redirect($this->generateUrl('route_liste'));
    }

    /**
     * @Route("/update/{id}/", name="update")
     */
    public function update(Request $request, $id,CategorieRepository $CategorieRepository, ProfesseurRepository $professeurRepository,Eleve $uneleve,UserPasswordEncoderInterface $passEncoder)
    {

        //Le paramètre Eleve $uneleve récupére tous les champs d'un enregistrement d'un élève. Il suffit de renseigner 
        //cela ainsi que l'id dans la route pour avoir les champs (puis passer en twig la variable)
        $session="";
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleve=$eleveRepository->find($id);

        //Je stocke dans $lacategory le nom de la catégorie renseigné dans la base de donnée
        $lacategory=$eleve->getCategory();

        $CategorieRepository=$em->getRepository(Categorie::class);
        $listecategory=$CategorieRepository->findAll();

       //Je stocke dans $img le nom de la photo renseigné dans la base de données
        $img=$eleve->getPhotoEleve();

        //Je stocke dans $formulaireEleveu le formulaire créé dans EleveType où 
        //les données de l'entité $eleve apparaissent dans chaque champs
        $formulaireEleveu=$this->createForm(EleveType::class,$eleve);

        //Je rajoute dans le formulaire un champ de type submit pour valider le formulaire
        $formulaireEleveu
        
        ->add('modifier', SubmitType::class, ['label'=>'Modifier']);

        // $resultat=[];
        // foreach($listecategory as $val) {
            // array_push($resultat,$val->getNomcategory());
        //}
        // ->add('category',ChoiceType::class, [
        //     'choices' =>array_combine($resultat,$resultat),
        //     ]);



/*
        ->add('cpville',ChoiceType::class, [
            'choices' =>array_combine($tabCpVille,$tabCpVille)
            ]);
*/      
        /*
        ->add('professeur',ChoiceType::class, [
            'choices' =>array_combine($resultatProf,$resultatProf),
            'multiple' =>true,
            ]);
        */

        
                        // //Formule très importante pour pouvoir conserver dans la liste déroulante la valeur de la base de données
                        // $resultat=[];
                        // foreach($listecategory as $val) {
                        //     array_push($resultat,$val->getNomcategory());
                        // }

                        // //fonction array_combine très importante pour que ce ne soit pas l'indice qui soit affiché mais la valeur (j'ai mis
                        // // bcq de temps à trouver)
                        // $formulaireEleve->add('category',ChoiceType::class, [
                        //     'choices' =>array_combine($resultat,$resultat)
                        // ]);


                        // $formulaireEleve->add('category',ChoiceType::class, [
                        //     'choices' => [
                        //         'Piano'=>'Piano',
                        //         'Violon'=>'Violon',
                        //         'Chant'=>'Chant',
                        //         'Eveil musical'=>'Eveil musical',
                        //         'Saxophone'=>'Saxophone',
                        //         'Guitare'=>'Guitare',
                        //     ],
                        //     'data' => $lacategory
                        // ]);

                    //  echo '<pre>'.print_r($listecategory, true).'</pre>';


        //Les nouvelles infos écrites dans le formulaire sont envoyées à la base de donnée
        $formulaireEleveu->handleRequest($request);

        //si la recherche est activée dans haut_admin.html.twig, pour que la vue attendue s'affiche à partir de la route show_recherche
        if($request->isMethod('post') && isset($_POST['recherche']))
        {
            //Si le nom de l'input de recherche n'est pas vide alors $nom prend la valeur saisie sinon prend la valeur d'un espace.
            if ($_POST['rechnom']!="")
            {
            $nom=$_POST['rechnom'];
            }
            else $nom=" ";

            if ($_POST['rechprenom']!="")
            {
            $prenom=$_POST['rechprenom'];
            }
            else $prenom=" ";
            

            if ($_POST['rechcategorie']!="")
            {
            $category=$_POST['rechcategorie'];
            }
            else $category=" ";



            if ($_POST['rechadresse']!="")
            {
            $adresse=$_POST['rechadresse'];
            }
            else $adresse=" ";


            if ($_POST['rechemail']!="")
            {
            $email=$_POST['rechemail'];
            }
            else $email=" ";

            if ($_POST['rechcodepostal']!="")
            {
            $cp=$_POST['rechcodepostal'];
            }
            else $cp=" ";


            return $this->redirect($this->generateUrl('show_recherche', array('nom' => $nom,'prenom' =>$prenom,'adresse' =>$adresse,
            'email' =>$email,'cp' =>$cp)));

        }

        // j'ai fragmenté la condition (méthod post ligne posteleveemodifier ligne postisvalid car sans faire cela, en mettant la 
        // condition sur une seule ligne, le message d'erreur d'isvalid se met en route qd j'essaye de faire une recherche d'élève dans le
        // formulaire de recherche de haut admin)

        // getData['nomcategory'] : Les données rentrées dans le champs appelé nomcategory 
        
        $tempPassword = $this->randomPassword();
        
        if ($request->isMethod('post')) 
        {
            if ($formulaireEleveu->isValid() && !isset($_POST['envoiMail']))
            {
            /*
            // CODE FONCTIONNEL !!
            $user=new User;
            $eleve->getUser()->setRoles(['ROLE_USER']); //Nous attribuons à chaque élève un role USER automatiquement
            $eleve->getUser()->setPassword($passEncoder->encodePassword($user,'moimoi'));
            $eleve->getUser()->setUsername($eleve->getEmailEleve());
            */

            // créer deux password : un password pas sécurisé qui sera effacé qd le password sécurisé se mettra en place.
            
            // Attribution d'un login et d'un mot de passse manuelle pour l'instant : 

            $file=$formulaireEleveu['photoEleve']->getData();

            if(!is_string($file)) 
                {
                    $filename=$file->getClientOriginalName();
                    $file->move($this->getParameter('emplacement_image'),
                    $filename);
                    $eleve->setPhotoEleve($filename);
                }

                else 
                {
                    $eleve->setPhotoEleve($img);
                }

            $em->persist($eleve);
            $em->flush();
            $session=$request->getSession();
            $session->getFlashBag()->add('message','La fiche a bien été mise à jour');
            $session->set('statut','warning');

            return $this->redirect($this->generateUrl('route_liste', ['id'=> $id]));
            }
        }
        
        return $this->render('admin/update.html.twig', [
            'form_update' => $formulaireEleveu->createView(),
            'uneleve' => $uneleve,
            'categoryall' => $CategorieRepository->findAll(),
            'lacategory' => $lacategory,
            'eleves' => $eleveRepository->findAll(),
            'session_flashbag' => $session,
            'image' => $img,
            'lemdp' => $tempPassword,
        ]);

    }

/*****************************************SELECTION********************************** */

    /**
     * @Route("/selection/{id}", name="selection")
     */
    public function select(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleve=$eleveRepository->find($id);
        $eleve->setSelectEleve(true);
        $em->persist($eleve);
        $em->flush();

        $select=$eleveRepository->findBy(['selectEleve' => true]);
        if( in_array(true, $select) ) {
            $selected='checked';
        }
        else {
            $selected='';
        }

        return $this->redirect($this->generateUrl('route_liste'));

    }



/****************************************DESELECTION********************************** */


    /**
     * @Route("/deselection/{id}", name="deselection")
     */
    public function deselect(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleve=$eleveRepository->find($id);
        $eleve->setSelectEleve(false);
        $em->persist($eleve);

        //$em->remove($eleve);
        $em->flush();

        return $this->redirect($this->generateUrl('route_liste'));

    }


/****************************************TOUTE DESELECTION********************************** */


    /**
     * @Route("/toutDedeselection", name="toutDeselection")
     */
    public function toutDeselect(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleve=$eleveRepository->findAll();
        
        for($i=0;$i<count($eleve);$i++)
        {
            $eleve[$i]->setSelectEleve(false);
            $em->persist($eleve[$i]);
            $em->flush();
        }

        //s'il y a true dans selectEleve (s'il existe au moins une coche), alors
        //selected prend la valeur de checked sinon rien
        $select=$eleveRepository->findBy(['selectEleve' => true]);
        if( in_array(true, $select) ) {
            $selected='checked';
        }
        else {
            $selected='';
        }

        return $this->redirect($this->generateUrl('route_liste'));

    }


/****************************************AFFICHE SELECTION********************************** */


    /**
     * @Route("/afficherSelection", name="afficherSelection")
     */
    public function afficherSelection(Request $request, Environment $twig)
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleves=$eleveRepository->findBy(['selectEleve'=>true]);
        
        //s'il y a true dans selectEleve (s'il existe au moins une coche), alors
        //selected prend la valeur de checked sinon rien
        $select=$eleveRepository->findBy(['selectEleve' => true]);
        if( in_array(true, $select) ) {
            $selected='checked';
        }
        else {
            $selected='';
        }

        return new Response($twig->render('admin/listeEleves.html.twig', [
            'select' => $selected,
            'eleves' => $eleves, 
            'nbrst_nom'=>$nbrst_nom=0,
            'nbrst_prenom'=>$nbrst_prenom=0,
            'nbrst_adresse'=>$nbrst_adresse=0,
            'nbrst_email'=>$nbrst_email=0,
            'nbrst_cpville'=>$nbrst_cpville=0,
            'nbrst_category' =>$nbrst_category=0,
            'aucunResultat' => '',
            ]));
    }




/****************************************TOUT SELECTIONNER********************************** */


    /**
     * @Route("/touteSelection", name="touteSelection")
     */
    public function touteSelection (Request $request, Environment $twig)
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleves=$eleveRepository->findAll();
        $select=$eleveRepository->findBy(['selectEleve' => true]);


        for ($i=0;$i<count($eleves);$i++)
        {
            $eleves[$i]->setSelectEleve(true);
            $em->persist($eleves[$i]);
            $em->flush();
        }
        
        //s'il y a true dans selectEleve (s'il existe au moins une coche), alors
        //selected prend la valeur de checked sinon rien
        $select=$eleveRepository->findBy(['selectEleve' => true]);
        if( in_array(true, $select) ) {
            $selected='checked';
        }
        else {
            $selected='';
        }

        return new Response($twig->render('admin/listeEleves.html.twig', [
            'select' => $selected,
            'eleves' => $eleves,
            'nbrst_nom'=>$nbrst_nom=0,
            'nbrst_prenom'=>$nbrst_prenom=0,
            'nbrst_adresse'=>$nbrst_adresse=0,
            'nbrst_email'=>$nbrst_email=0,
            'nbrst_cpville'=>$nbrst_cpville=0,
            'nbrst_category' =>$nbrst_category=0,
            'aucunResultat' => '', 
            ]));
    }

/*****************************************DELETE************************************************************************************/

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleve=$eleveRepository->find($id);
        $em->remove($eleve);
        $em->flush();
        $session=$request->getSession();
        $session->getFlashBag()->add('message','La fiche a bien été supprimée');
        $session->set('statut','success');
        return $this->redirect($this->generateUrl('route_liste'));

    }


/*************************************************RESULTAT RECHERCHE******************************************************************* */

    /**
     * @Route("/showsearch/{nom}&{prenom}&{adresse}&{email}&{cp}", name="show_recherche")
     */
    public function showSearch (Request $request, $nom, $prenom, $adresse, $email, $cp, EleveRepository $eleveRepository, CategorieRepository $CategorieRepository)
    {

            $em=$this->getDoctrine()->getManager();
            $eleveRepository=$em->getRepository(Eleve::class);
            
            //Renvoie dans la vue showsearch un tableau des résultats à partir de la recherche par nom
            $tab_nomSearch=$eleveRepository->findBy(array('nomEleve' => $nom));
            //si le champs de recherche par nom d'élève est rempli alors $tab_Search prend la valeur du tableau du résultat, et ce
            //pour chaque champs de recherche pour que dans le twig, je ne sois pas obligée d'afficher des "for" pour chaque tableau
            //le tableau $tab_Search rassemblera donc en un seul chaque tableau
            
            $nbrst_nom=count($tab_nomSearch);
            if($nbrst_nom>0) 
            {
                $tab_Search=$tab_nomSearch;
            }
            else $nbrst_nom=0; 

            
            //si seul le champs de recherche par prenom est rempli
            $tab_prenomSearch=$eleveRepository->findBy(array('prenomEleve' => $prenom));
            $nbrst_prenom=count($tab_prenomSearch);

            if($nbrst_prenom>0) {
                $tab_Search=$tab_prenomSearch;
            }
            else $nbrst_prenom=0;                    //je dois dire que $nbrst_prenom est égal à 0 sinon s'il n'y a pas de résultat dans la recherche,
                                                    //$nbrst_prenom est indéfini et symfony transmet un message d'erreur
    
            

            $tab_adresseSearch=$eleveRepository->findBy(array('adresseEleve' => $adresse));
            $nbrst_adresse=count($tab_adresseSearch);
            if($nbrst_adresse>0) 
            {
                $tab_Search=$tab_adresseSearch;
            }
            else $nbrst_adresse=0;
            
            $tab_emailSearch=$eleveRepository->findBy(array('emailEleve' => $email));
            
            
            
            $nbrst_email=count($tab_emailSearch);
            if($nbrst_email>0) 
            {
                $tab_Search=$tab_emailSearch;
            }
            else $nbrst_email=0;

            


            $tab_cpSearch=$eleveRepository->findBy(array('cpville' => $cp));
            $nbrst_cpville=count($tab_cpSearch);
            if($nbrst_cpville>0) 
            {
                $tab_Search=$tab_cpSearch;
            }
            else $nbrst_cpville=0;

            //si la recherche est activée dans haut_admin.html.twig, pour que la vue attendue s'affiche à partir de la route show_recherche
            if($request->isMethod('post') && isset($_POST['recherche']))
            {
            //Si le nom de l'input de recherche n'est pas vide alors $nom prend la valeur saisie sinon prend la valeur d'un espace.
            if ($_POST['rechnom']!="")
            {
            $nom=$_POST['rechnom'];
            }
            else $nom=" ";

            if ($_POST['rechprenom']!="")
            {
            $prenom=$_POST['rechprenom'];
            }
            else $prenom=" ";
            

            if ($_POST['rechcategorie']!="")
            {
            $category=$_POST['rechcategorie'];
            }
            else $category=" ";

            if ($_POST['rechadresse']!="")
            {
            $adresse=$_POST['rechadresse'];
            }
            else $adresse=" ";

            if ($_POST['rechemail']!="")
            {
            $email=$_POST['rechemail'];
            }
            else $email=" ";

            if ($_POST['rechcodepostal']!="")
            {
            $cp=$_POST['rechcodepostal'];
            }
            else $cp=" ";

                //return $this->redirect($this->generateUrl('search', array('nomEleve' => $nom)));
    
                //('route_particulier', {id: eleve.id})
                //$ident=$request->query->get('leleve');
    
                $em=$this->getDoctrine()->getManager();
                $eleveRepository=$em->getRepository(Eleve::class);
                //$eleve=$eleveRepository->findBy($nom);
                //print_r($eleve);
    
                return $this->redirect($this->generateUrl('show_recherche', array('nom' => $nom,'prenom' =>$prenom,'adresse' =>$adresse,
                'email' =>$email,'cp' =>$cp)));
            }

            if(!isset($tab_Search)) {
                $tab_Search=[];
            }

        return $this->render('admin/listeEleves.html.twig', [
            //'nom_search' => $nom,
            'action' => '',
            //'eleves' => $eleveRepository->findAll(),
            'eleves' => $tab_Search, //affiche le repository des résultats trouvés
            'nbrst_nom'=>$nbrst_nom,
            'nbrst_prenom'=>$nbrst_prenom,
            'nbrst_adresse'=>$nbrst_adresse,
            'nbrst_email'=>$nbrst_email,
            'nbrst_cpville'=>$nbrst_cpville,
            
            'leprenom'=> $prenom,
            'tab_Search'=>$tab_Search,
            'aucunResultat' => 'AUCUN RESULTAT N\'A ETE TROUVE',
        ]);
    }


/*********************************************************SHOW******************************************************************/



    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(Request $request, $id, CategorieRepository $CategorieRepository, Eleve $uneleve)
    {
        $em=$this->getDoctrine()->getManager();
        $eleveRepository=$em->getRepository(Eleve::class);
        $eleve=$eleveRepository->find($id);

        //Je stocke dans $lacategory le nom de la catégorie renseigné dans la base de donnée
        $lacategory=$eleve->getcategory();

        $CategorieRepository=$em->getRepository(Categorie::class);
        $listecategory=$CategorieRepository->findAll();


       //Je stocke dans $img le nom de la photo renseigné dans la base de données
        $img=$eleve->getPhotoEleve();

        //Je stocke dans $formulaireEleveu le formulaire créé dans EleveType où les données de l'entité $eleve apparaissent dans chaque champs
        $formulaireEleveu=$this->createForm(EleveType::class,$eleve);

        // $resultat=[];
        // foreach($listecategory as $val) {
        //     array_push($resultat,$val->getNomcategory());
        // }
        // //Je rajoute dans le formulaire un champ de type submit pour valider le formulaire
        // $formulaireEleveu
        
        // ->add('category',ChoiceType::class, [
        //     'choices' =>array_combine($resultat,$resultat)
        //     ]);


        //si la recherche est activée dans haut_admin.html.twig, pour que la vue attendue s'affiche à partir de la route show
        if($request->isMethod('post') && isset($_POST['recherche']))
        {
            //Si le nom de l'input de recherche n'est pas vide alors $nom prend la valeur saisie sinon prend la valeur d'un espace.
            if ($_POST['rechnom']!="")
            {
            $nom=$_POST['rechnom'];
            }
            else $nom=" ";

            if ($_POST['rechprenom']!="")
            {
            $prenom=$_POST['rechprenom'];
            }
            else $prenom=" ";
            

            if ($_POST['rechcategorie']!="")
            {
            $category=$_POST['rechcategorie'];
            }
            else $category=" ";



            if ($_POST['rechadresse']!="")
            {
            $adresse=$_POST['rechadresse'];
            }
            else $adresse=" ";


            if ($_POST['rechemail']!="")
            {
            $email=$_POST['rechemail'];
            }
            else $email=" ";

            if ($_POST['rechcodepostal']!="")
            {
            $cp=$_POST['rechcodepostal'];
            }
            else $cp=" ";

            return $this->redirect($this->generateUrl('show_recherche', array('nom' => $nom,'prenom' =>$prenom,'adresse' =>$adresse,
            'email' =>$email,'cp' =>$cp)));
    
        }

        //variable intégration_mail qui sert à insérer le contenu de show_boiteMail.html.twig">
        
        return $this->render('admin/show.html.twig', [
            'form_show' => $formulaireEleveu->createView(),
            'uneleve' => $uneleve,
            'categoryall' => $CategorieRepository->findAll(),
            'lacategory' => $lacategory,
            'eleves' => $eleveRepository->findAll(),
            'action' => '',
            'image' => $img,

        ]);

    }



/****************************************LISTE USER**********************************************/
    /**
     * @Route("/liste_user", name="route_liste_user")
     */
    public function liste_user(Request $request, EleveRepository $eleveRepository)
    {

        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $user=$userRepository->findAll();
        if (!isset($session)) {
            $session="";
        }
        
        return $this->render('admin/listeUser.html.twig', [
            
            'user'=>$user,
            'session_flashbag' => $session,
            'eleves' => $eleveRepository->findAll(),
            'nbrst_nom'=>$nbrst_nom=0,
            'nbrst_prenom'=>$nbrst_prenom=0,
            'nbrst_adresse'=>$nbrst_adresse=0,
            'nbrst_email'=>$nbrst_email=0,
            'nbrst_cpville'=>$nbrst_cpville=0,
            'nbrst_category' =>$nbrst_category=0,
            'aucunResultat' => '', 
            'overlay' => "overlay",
        ]);
        
    }

/****************************************SUPPRIMER USER**********************/

    /**
     * @Route("/user/delete/{id}", name="deleteuser")
     */
    public function deleteuser(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $delUser=$userRepository->find($id);
        $em->remove($delUser);
        $em->flush();
        return $this->redirect($this->generateUrl('route_liste_user'));


    }

/****************************************MODIFIER USER***PAGE*************************************/

    /**
     * @Route("/user/update/{id}", name="updateuser")
     */
    public function updateuser(EleveRepository $eleveRepository,$id, Request $request, UserPasswordEncoderInterface $passEncoder)
    {
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $user=$userRepository->find($id);
        $eleves=$eleveRepository->findAll();
        
        $form=$this->createForm(UserType::class,$user)
        ->add('createUser', SubmitType::class, ['label'=>'Modifier le compte utilisateur']);

        $form->handleRequest($request);

        $mdpAleatoire="";

        if ($request->isMethod('post') && $form->isValid()) {
            $mdpAleatoire=$this->randomPassword();
            $user
            ->setPassword($passEncoder->encodePassword($user,$mdpAleatoire));
            $em->persist($user);
            $em->flush();
        }

        return $this->render('register/update.html.twig', [
            'form' => $form->createView(),
            'mdpAleatoire' => $mdpAleatoire,
            'user' => $user,
            'eleves' => $eleves
        ]);
    }


/***************************************MODIFIER USER***POP UP***********************************************/

    /**
     * @Route("/user/update/{id}/updateUserPop", name="updateUserPop")
     */
    public function updateUserPop(\Swift_Mailer $mailer, EleveRepository $eleveRepository,$id, Request $request, UserPasswordEncoderInterface $passEncoder)
    {
        
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $unUser=$userRepository->find($id);
        $uneleve=$unUser->getEleve();

        $eleves=$eleveRepository->findAll();
        $user=$userRepository->findAll();

        $session="";

        if( $request->isMethod('post') ) {

            
            $unUser->setUsername($_POST['user']['username']);

            for ($i=0;$i<count($_POST['user']['roles']);$i++) {
                $unUser->setRoles([$_POST['user']['roles'][$i]]); 
                $em->persist($unUser);
                $em->flush();
            }
            
            $mdpAleatoire=$this->randomPassword();
            $unUser
            ->setPassword($passEncoder->encodePassword($unUser,$mdpAleatoire));
            $em->persist($unUser);
            $em->flush();

            
            $session=$request->getSession();
            $session->getFlashBag()->add('message','Votre modification a bien été prise en compte');
            $session->set('statut','warning');

            return $this->render('admin/listeUser.html.twig', [
                'user'=>$user, //Attention : tous les utilisateurs
                'unUser' => $unUser,
                'uneleve' => $uneleve,
                'session_flashbag' => $session,
                'eleves' => $eleveRepository->findAll(),
                'nbrst_nom'=>$nbrst_nom=0,
                'nbrst_prenom'=>$nbrst_prenom=0,
                'nbrst_adresse'=>$nbrst_adresse=0,
                'nbrst_email'=>$nbrst_email=0,
                'nbrst_cpville'=>$nbrst_cpville=0,
                'nbrst_category' =>$nbrst_category=0,
                'aucunResultat' => '',
            ]);
        }

    }


/***********************************************EMAIL***PAGE***********************************************/
    /**
     * @Route("/user/update/{id}/email", name="mailUser")
     */
    public function mailUser(\Swift_Mailer $mailer, EleveRepository $eleveRepository,$id, Request $request, UserPasswordEncoderInterface $passEncoder)
    {
        
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $user=$userRepository->find($id);
        $uneleve=$user->getEleve();
        $eleves=$eleveRepository->findAll();
        $mail=new Mail;
        $session="";

        $formMail=$this->createForm(MailType::class,$mail);
        $formMail
        ->add('envoyer', SubmitType::class, array('label'=>'Envoyer'));
        $formMail->handleRequest($request);

        if( $request->isMethod('post') && $formMail->isValid() ) {

            $from=$formMail['fromMail']->getData();
            $objet=$formMail['objetMail']->getData();
            $to=$formMail['toMail']->getData();
            $message=$formMail['messageMail']->getData();

            $message=(new \Swift_Message($objet))
            ->setFrom($from)
            ->setTo($to)
            ->setBody(
                $this->renderView(
                    'email/envoi_mail.html.twig',[
                        'messageAenvoyer' => $message
                    ]),
                    'text/html'
                );
                
            $mailer->send($message);
            $user->addMail($mail);
            $em->persist($mail);
            $em->flush();

            
            $session=$request->getSession();
            $session->getFlashBag()->add('message','Votre mail a bien été envoyé');
            $session->set('statut','warning');
            
        }

        return $this->render('user/mailUser.html.twig', [
            'user' => $user,
            'uneleve' => $uneleve,
            'eleves' => $eleves,
            'session_flashbag' => $session,
            'form_insert' => $formMail->createView(),
        ]);
    }
/***********************************************EMAIL***POP UP***********************************************/

    /**
     * @Route("/user/update/{id}/emailPop", name="mailUserPop")
     */
    public function mailUserPop(\Swift_Mailer $mailer, EleveRepository $eleveRepository,$id, Request $request)
    {
        
        $em=$this->getDoctrine()->getManager();
        $userRepository=$em->getRepository(User::class);
        $unUser=$userRepository->find($id);
        $user=$userRepository->findAll();

        $uneleve=$unUser->getEleve();
        $eleves=$eleveRepository->findAll();
        $mail=new Mail;
        $session="";


        $formMail=$this->createForm(MailType::class,$mail);

        $formMail->handleRequest($request);


        if( $request->isMethod('post') ) {

            $from=$_POST['mail']['fromMail'];
            $objet=$_POST['mail']['objetMail'];
            $to=$_POST['mail']['toMail'];
            $message=$_POST['mail']['messageMail'];

            $message=(new \Swift_Message($objet))
            ->setFrom($from)
            ->setTo($to)
            ->setBody(
                $this->renderView(
                    'email/envoi_mail.html.twig',[
                        'messageAenvoyer' => $message
                    ]),
                    'text/html'
                );
                
            $mailer->send($message);
            $unUser->addMail($mail);
            $em->persist($mail);
            $em->flush();
            
            $session=$request->getSession();
            $session->getFlashBag()->add('message','Votre mail a bien été envoyé');
            $session->set('statut','warning');

            return $this->render('admin/listeUser.html.twig', [
                'user'=>$user, //Attention : tous les utilisateurs
                'unUser' => $unUser,
                'uneleve' => $uneleve,
                'session_flashbag' => $session,
                'eleves' => $eleveRepository->findAll(),
                'nbrst_nom'=>$nbrst_nom=0,
                'nbrst_prenom'=>$nbrst_prenom=0,
                'nbrst_adresse'=>$nbrst_adresse=0,
                'nbrst_email'=>$nbrst_email=0,
                'nbrst_cpville'=>$nbrst_cpville=0,
                'nbrst_category' =>$nbrst_category=0,
                'aucunResultat' => '',
            ]);
        }

    }

/***********************************************PASSWORD**************************************************/

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
