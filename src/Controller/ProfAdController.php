<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Eleve;
use Twig\Environment;
use App\Form\ProfAdType;
use App\Entity\Categorie;
use App\Entity\Professeur;
use App\Repository\EleveRepository;
use App\Repository\CategorieRepository;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProfAdController extends AbstractController
{
    /**
     * @Route("/professeur/liste", name="liste_prof")
     */

    public function liste (Request $request, ProfesseurRepository $professeurRepository,EleveRepository $eleveRepository): Response
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeurs=$professeurRepository->findAll();
        $eleves=$eleveRepository->findAll();
        
        //s'il y a true dans selectEleve (s'il existe au moins une coche), alors
        //selected prend la valeur de checked sinon rien
        $select=$professeurRepository->findBy(['selectProf'=>true]);
        if( in_array(true, $select) ) {
            $selected='checked';
        }
        else {
            $selected='';
        }

        return $this->render('professeur/listeProf.html.twig', [
            'select' => $selected,
            'professeurs' => $professeurs,  
            'eleves' => $eleves,
        ]);
    }

    /**
     * @Route("/professeur/insert", name="prof_insert")
     */

    public function insert(Request $request, ProfesseurRepository $professeurRepository,EleveRepository $eleveRepository): Response
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeur=new Professeur;
        $professeurs=$professeurRepository->findAll();
        $eleves=$eleveRepository->findAll();

        $form_insert=$this->createForm(ProfAdType::class,$professeur)
        ->add('creer', SubmitType::class, ['label'=>'Créer']);


        $form_insert->handleRequest($request);

        if( $request->isMethod('post') && $form_insert->isValid() ) 
        {

            $em=$this->getDoctrine()->getManager();
            $file=$form_insert['photoProf']->getData();

            if(!is_string($file)) 
            {
                $filename=$file->getClientOriginalName();
                $file->move($this->getParameter('emplacement_image'),
                $filename);
                $professeur->setPhotoProf($filename);
            }

            else 
            {
                return $this->redirect($this->generateUrl('prof_insert'));
            }
        
            $em->persist($professeur);
            $em->flush();
            return $this->redirect($this->generateUrl('liste_prof'));
        }

        return $this->render('professeur/insert.html.twig', [
            'professeurs' => $professeurs,
            'eleves' => $eleves,
            'form_insert' => $form_insert->createView(),
        ]);
    }

    /**
     * @Route("/professeur/update/{id}", name="prof_update")
     */
    
    public function update(Request $request, ProfesseurRepository $professeurRepository,EleveRepository $eleveRepository, $id): Response
    {
        
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeur=$professeurRepository->find($id);
        $eleves=$eleveRepository->findAll();

        $categorieRepository=$em->getRepository(Categorie::class);
        $tabCategorie=$categorieRepository->findAll();

        $img=$professeur->getPhotoProf();

        $formProf=$this->createForm(ProfAdType::class,$professeur);
        
        $formProf
        ->add('modifier', SubmitType::class, ['label'=>'Modifier']);
        

// avec le code ci-dessous, les méthodes add et remove de l'entite Eleve fonctionnent
/*
->add('eleves', CollectionType::class,[
    'allow_add' => true,
    'allow_delete' => true,
    'prototype' => true,    
    'by_reference' => false
]);
*/
        /*
        ->add('eleves', EntityType::class, [
            'class'=> Eleve::class,
            'label'=>'Ses élèves : ',
            'multiple'=>true,
            'required'=>false
        ]); 
        */


        $formProf->handleRequest($request);

        if ($request->isMethod('post') && $formProf->isValid())
            {
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
                //Jusqu'à cette étape, mis à part la modification sur l'ajout des élèves et des catégories, 
                //les autres modifications sont prises en compte.
                //upload classique jusque-là


            if (isset($_POST['eleveSelect']) || isset($_POST['categSelect']))
            {
                if (isset($_POST['eleveSelect'])) 
                {
                        //J'associe le professeur à plusieurs élèves et ce dynamiquement
                        for ($a=0;$a<count($_POST['eleveSelect']);$a++)
                        {
                            $eleve=$eleveRepository->find($_POST['eleveSelect'][$a]);
                            $professeur->addElefe($eleve);
                            $em->persist($professeur);
                            $em->flush();
                        }
                }

                if (isset($_POST['categSelect'])) 
                {
                        //J'associe le professeur à une catégorie et ce dynamiquement
                        for ($i=0;$i<count($_POST['categSelect']);$i++)
                        {
                        $categorie=$categorieRepository->find($_POST['categSelect'][$i]);                
                        $professeur->addCategory($categorie);
                        $em->persist($professeur);
                        $em->flush();
                        }

                }
                
                
            }
        
        return $this->redirect($this->generateUrl('prof_update', ['id'=> $id]));
        
        }
            
        return $this->render('professeur/update.html.twig', [
            'professeur' => $professeur,
            'eleves' => $eleves,
            'form_update' => $formProf->createView(),
            'tabCategorie' => $tabCategorie, 
            'tousLesProf' => $professeurRepository->findAll(),
        ]);

    }


    /**
     * @Route("/professeur/delete/{id}", name="prof_delete")
     */
    public function select(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeur=$professeurRepository->find($id);
        $em->persist($professeur);
        $em->remove($professeur);
        $em->flush();

        return $this->redirect($this->generateUrl('liste_prof'));
    }

    /**
     * @Route("/professeur/delete/categorie/{id}/", name="categorie_delete")
     */
    public function categorie_delete(Request $request, $id, CategorieRepository $categorieRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        
        //l'id représente l'id de la categorie.
        $categorie=$categorieRepository->find($id);

        //l'indice 0 me permet d'accéder directement à la valeur de l'Id du professeur.
        $idProf=$categorie->getProfesseurs()[0]->getId();
        
        //l'id du professeur était nécessaire pour trouver le professeur liée à la catégorie
        // que je veux supprimer dans la page de modification du professeur.
        $professeur=$professeurRepository->find($idProf);
        
        //la méthode removeCategory générée automatiquement par symfony me permet de supprimer
        //la catégorie
        $professeur->removeCategory($categorie);
        
        $em->persist($categorie);
        $em->flush();

        return $this->redirect($this->generateUrl('prof_update', array('id'=>$idProf)));
    }

    /**
     * @Route("/professeur/delete/eleve/{id}?{ipf}", name="eleve_delete")
     */
    public function eleve_delete(Request $request, $id, $ipf, EleveRepository $eleveRepository)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        
        //l'id représente l'id de l'élève.
        $eleve=$eleveRepository->find($id);
        
        //l'indice 0 me permet d'accéder directement à la valeur de l'Id du professeur.
            //$idProf=$eleve->getProfesseur()[0]->getId();
            
            //autre possibilité de récupérer l'id du professeur variable ($ipf):mettre en paramètre l'id du professeur 
            //dans l'url du lien destiné à la suppression de l'élève $ipf. Nous utiliserons cette méthode
        
        
        //l'id du professeur était nécessaire pour trouver le professeur liée à l'élève
        // que je veux supprimer dans la page de modification du professeur, $idprof
        $professeur=$professeurRepository->find($ipf);
        
        //la méthode removeCategory générée automatiquement par symfony me permet de supprimer
        //la catégorie
        $professeur->removeElefe($eleve);
        
        $em->persist($eleve);
        $em->flush();

        return $this->redirect($this->generateUrl('prof_update', array('id'=>$ipf)));
    }


/*****************************************SELECTION********************************** */


    /**
     * @Route("/professeur/selectionProf/{id}", name="selectionProf")
     */
    public function selection(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeur=$professeurRepository->find($id);
        $professeur->setSelectProf(true);
        $em->persist($professeur);
        $em->flush();

        return $this->redirect($this->generateUrl('liste_prof'));

    }


/****************************************DESELECTION*D'UN PROFESSEUR********************************* */


    /**
     * @Route("/professeur/deselectionProf/{id}", name="deselectionProf")
     */
    public function deselectProf (Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeur=$professeurRepository->find($id);
        $professeur->setSelectProf(false);
        $em->persist($professeur);
        $em->flush();

        return $this->redirect($this->generateUrl('liste_prof'));

    }
/****************************************TOUTE DESELECTION********************************** */


    /**
     * @Route("/professeur/deselectionProfTout", name="deselectionProfTout")
     */
    public function deselect(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeur=$professeurRepository->findAll();
        
        for($i=0;$i<count($professeur);$i++)
        {
            $professeur[$i]->setSelectProf(false);
            $em->persist($professeur[$i]);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('liste_prof'));

    }

/****************************************AFFICHE SELECTION********************************** */


    /**
     * @Route("/professeur/afficherSelection", name="afficherSelectionProf")
     */
    public function afficherSelection(Request $request, Environment $twig)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(professeur::class);
        $professeurs=$professeurRepository->findBy(['selectProf'=>true]);
        
        //s'il y a true dans selectEleve (s'il existe au moins une coche), alors
        //selected prend la valeur de checked sinon rien
        
        if( in_array(true, $professeurs) ) {
            $selected='checked';
        }
        else {
            $selected='';
        }

        return new Response($twig->render('professeur/listeProf.html.twig', [
            'select'  => $selected,
            'professeurs' => $professeurs, 
            'nbrst_nom'=>$nbrst_nom=0,
            'nbrst_prenom'=>$nbrst_prenom=0,
            'nbrst_adresse'=>$nbrst_adresse=0,
            'nbrst_email'=>$nbrst_email=0,
            'nbrst_cpville'=>$nbrst_cpville=0,
            'nbrst_categorie' =>$nbrst_categorie=0,
            'aucunResultat' => '',
            ]));
    }




/****************************************TOUT SELECTIONNER********************************** */


    /**
     * @Route("/professeur/touteSelection", name="touteSelectionProf")
     */
    public function touteSelection (Request $request, Environment $twig)
    {
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeurs=$professeurRepository->findAll();
        $select=$professeurRepository->findBy(['selectProf'=>true]);

        for ($i=0;$i<count($professeurs);$i++)
        {
            $professeurs[$i]->setSelectProf(true);
            $em->persist($professeurs[$i]);
            $em->flush();
        }
        
        if( in_array(true, $professeurs) ) {
            $selected='checked';
        }
        else {
            $selected='';
        }
        
        return new Response($twig->render('professeur/listeProf.html.twig', [
            'select' => $selected,
            'professeurs' => $professeurs,
            'nbrst_nom'=>$nbrst_nom=0,
            'nbrst_prenom'=>$nbrst_prenom=0,
            'nbrst_adresse'=>$nbrst_adresse=0,
            'nbrst_email'=>$nbrst_email=0,
            'nbrst_cpville'=>$nbrst_cpville=0,
            'nbrst_categorie' =>$nbrst_categorie=0,
            'aucunResultat' => '', 
            ]));
    }




    
}
