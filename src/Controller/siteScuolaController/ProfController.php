<?php

namespace App\Controller\siteScuolaController;


use App\Entity\Professeur;
use App\Form\ProfesseurType;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfController extends AbstractController
{

    /**
     * @Route("/scuola/professeur/italiano/{id}", name="scuola_prof_italiano")
     */
    public function italiano_update (Request $request, $id, ProfesseurRepository $professeurRepository)
    {


        //Je récupère la liste des professeurs de la base de données et je stocke cette liste dans une variable
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeurBy=$professeurRepository->find($id);
        
        $formulaireProf=$this->createForm(ProfesseurType::class,$professeurBy);

        $formulaireProf
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));

        $formulaireProf->handleRequest($request);

        $img=$professeurBy->getPhotoProf();
        //La validation sur une fiche

        if( $request->isMethod('post') && $formulaireProf->isValid() ) 
        {
                if($formulaireProf->isValid()) 
                {
                    $file=$formulaireProf['photoProf']->getData();
                    if(!is_string($file)) 
                        {
                            $filename=$file->getClientOriginalName();
                            $file->move($this->getParameter('emplacement_image_professeurs'),
                            $filename);
                            $professeurBy->setPhotoProf($filename);
                        }
                }

            else 
            {
                $professeurBy->setPhotoProf($img);
            }

            $em->persist($professeurBy);
            $em->flush();
            return $this->render('scuola/professeur/italiano.html.twig', [
                'form_update' => $formulaireProf->createView(),
                'enr_prof' => $professeurBy ]);

            // $session=$request->getSession();
            // $session->getFlashBag()->add('message','le Produit a été mis à jour');
            // $session->set('statut','success');
            
            
        }

        return $this->render('scuola/professeur/italiano.html.twig', [
            'form_update' => $formulaireProf->createView(),
            'enr_prof' => $professeurBy,


        ]);

    }



    /**
     * @Route("/scuola/professeur/adel/{id}", name="scuola_prof_adel")
     */
    public function adel_update (Request $request, $id, ProfesseurRepository $professeurRepository)
    {

        //Je récupère la liste des professeurs de la base de données et je stocke cette liste dans une variable
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeurBy=$professeurRepository->find($id);
        
        $formulaireProf=$this->createForm(ProfesseurType::class,$professeurBy);

        $formulaireProf
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));

        $formulaireProf->handleRequest($request);

        $img=$professeurBy->getPhotoProf();
        //La validation sur une fiche

        if( $request->isMethod('post') && $formulaireProf->isValid() ) 
        {
                if($formulaireProf->isValid()) 
                {
                    $file=$formulaireProf['photoProf']->getData();
                    if(!is_string($file)) 
                        {
                            $filename=$file->getClientOriginalName();
                            $file->move($this->getParameter('emplacement_image_professeurs'),
                            $filename);
                            $professeurBy->setPhotoProf($filename);
                            
                        }
                }

            else 
            {
                $professeurBy->setPhotoProf($img);
            }

            $em->persist($professeurBy);
            $em->flush();
                    return $this->render('scuola/professeur/adel.html.twig', [
                        'form_update' => $formulaireProf->createView(),
                        'enr_prof' => $professeurBy,

                        
                    ]);
                
        }

        return $this->render('scuola/professeur/adel.html.twig', [
            'form_update' => $formulaireProf->createView(),
            'enr_prof' => $professeurBy,

        ]);

    }




    /**
     * @Route("/scuola/professeur/hemmo/{id}", name="scuola_prof_hemmo")
     */
    public function hemmo_update (Request $request, $id, ProfesseurRepository $professeurRepository)
    {


        //Je récupère la liste des professeurs de la base de données et je stocke cette liste dans une variable
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeurBy=$professeurRepository->find($id);
        
        $formulaireProf=$this->createForm(ProfesseurType::class,$professeurBy);

        $formulaireProf
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));

        $formulaireProf->handleRequest($request);

        $img=$professeurBy->getPhotoProf();
        //La validation sur une fiche

        if( $request->isMethod('post') && $formulaireProf->isValid() ) 
        {
                if($formulaireProf->isValid()) 
                {
                    $file=$formulaireProf['photoProf']->getData();
                    if(!is_string($file)) 
                        {
                            $filename=$file->getClientOriginalName();
                            $file->move($this->getParameter('emplacement_image_professeurs'),
                            $filename);
                            $professeurBy->setPhotoProf($filename);
                            
                        }
                }

            else 
            {
                $professeurBy->setPhotoProf($img);
            }

            $em->persist($professeurBy);
            $em->flush();
                    return $this->render('scuola/professeur/hemmo.html.twig', [
                        'form_update' => $formulaireProf->createView(),
                        'enr_prof' => $professeurBy,

                        
                    ]);
                
        }

        return $this->render('scuola/professeur/hemmo.html.twig', [
            'form_update' => $formulaireProf->createView(),
            'enr_prof' => $professeurBy,


        ]);

    }




    /**
     * @Route("/scuola/professeur/vaudron/{id}", name="scuola_prof_vaudron")
     */
    public function vaudron_update (Request $request, $id, ProfesseurRepository $professeurRepository)
    {

        //Je récupère la liste des professeurs de la base de données et je stocke cette liste dans une variable
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeurBy=$professeurRepository->find($id);
        
        $formulaireProf=$this->createForm(ProfesseurType::class,$professeurBy);

        $formulaireProf
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));

        $formulaireProf->handleRequest($request);

        $img=$professeurBy->getPhotoProf();
        //La validation sur une fiche

        if( $request->isMethod('post') && $formulaireProf->isValid() ) 
        {
                if($formulaireProf->isValid()) 
                {
                    $file=$formulaireProf['photoProf']->getData();
                    if(!is_string($file)) 
                        {
                            $filename=$file->getClientOriginalName();
                            $file->move($this->getParameter('emplacement_image_professeurs'),
                            $filename);
                            $professeurBy->setPhotoProf($filename);
                            
                        }
                }

            else 
            {
                $professeurBy->setPhotoProf($img);
            }

            $em->persist($professeurBy);
            $em->flush();
                    return $this->render('scuola/professeur/vaudron.html.twig', [
                        'form_update' => $formulaireProf->createView(),
                        'enr_prof' => $professeurBy,

                        
                    ]);
                
        }

        return $this->render('scuola/professeur/vaudron.html.twig', [
            'form_update' => $formulaireProf->createView(),
            'enr_prof' => $professeurBy,


        ]);

    }



    /**
     * @Route("/scuola/professeur/luspinsky/{id}", name="scuola_prof_luspinsky")
     */
    public function luspinsky_update (Request $request, $id, ProfesseurRepository $professeurRepository)
    {

        //Je récupère la liste des professeurs de la base de données et je stocke cette liste dans une variable
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeurBy=$professeurRepository->find($id);
        
        $formulaireProf=$this->createForm(ProfesseurType::class,$professeurBy);

        $formulaireProf
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));

        $formulaireProf->handleRequest($request);

        $img=$professeurBy->getPhotoProf();
        //La validation sur une fiche

        if( $request->isMethod('post') && $formulaireProf->isValid() ) 
        {
                if($formulaireProf->isValid()) 
                {
                    $file=$formulaireProf['photoProf']->getData();
                    if(!is_string($file)) 
                        {
                            $filename=$file->getClientOriginalName();
                            $file->move($this->getParameter('emplacement_image_professeurs'),
                            $filename);
                            $professeurBy->setPhotoProf($filename);
                            
                        }
                }

            else 
            {
                $professeurBy->setPhotoProf($img);
            }

            $em->persist($professeurBy);
            $em->flush();
                    return $this->render('scuola/professeur/luspinsky.html.twig', [
                        'form_update' => $formulaireProf->createView(),
                        'enr_prof' => $professeurBy,

                        
                    ]);
                
        }

        return $this->render('scuola/professeur/luspinsky.html.twig', [
            'form_update' => $formulaireProf->createView(),
            'enr_prof' => $professeurBy,


        ]);

    }



    /**
     * @Route("/scuola/professeur/rozand/{id}", name="scuola_prof_rozand")
     */
    public function rozand_update (Request $request, $id, ProfesseurRepository $professeurRepository)
    {

        //Je récupère la liste des professeurs de la base de données et je stocke cette liste dans une variable
        $em=$this->getDoctrine()->getManager();
        $professeurRepository=$em->getRepository(Professeur::class);
        $professeurBy=$professeurRepository->find($id);
        
        $formulaireProf=$this->createForm(ProfesseurType::class,$professeurBy);

        $formulaireProf
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));

        $formulaireProf->handleRequest($request);

        $img=$professeurBy->getPhotoProf();
        //La validation sur une fiche

        if( $request->isMethod('post') && $formulaireProf->isValid() ) 
        {
                if($formulaireProf->isValid()) 
                {
                    $file=$formulaireProf['photoProf']->getData();
                    if(!is_string($file)) 
                        {
                            $filename=$file->getClientOriginalName();
                            $file->move($this->getParameter('emplacement_image_professeurs'),
                            $filename);
                            $professeurBy->setPhotoProf($filename);
                            
                        }
                }

            else 
            {
                $professeurBy->setPhotoProf($img);
            }

            $em->persist($professeurBy);
            $em->flush();
                    return $this->render('scuola/professeur/rozand.html.twig', [
                        'form_update' => $formulaireProf->createView(),
                        'enr_prof' => $professeurBy,

                        
                    ]);
                
        }

        return $this->render('scuola/professeur/rozand.html.twig', [
            'form_update' => $formulaireProf->createView(),
            'enr_prof' => $professeurBy,


        ]);

    }





















    }







?>