<?php

namespace App\Controller\siteScuolaController;

use App\Entity\Actualite;
use App\Entity\Categorie;
use App\Form\ActualiteType;
use App\Form\CategorieType;
use App\Repository\ActualiteRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoursController extends AbstractController
{
    /**
     * @Route("/lascuola/cours/eveil/{id}", name="scuola_cours_eveil")
     */
    public function eveil (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //la fonction permet de modifier ce qu'il y a indiqué sur la page éveil du site web

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                $em->persist($categorieby);
                $em->flush();
                return $this->render('scuola/cours/eveil.html.twig', [
                    'form_insert' => $formulaireCategorie->createView(),
                    'cours' => $categorieby,
                    'lacategorie' => $lacategorie,
                    
                ]);
                
        }

        return $this->render('scuola/cours/eveil.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }


    /**
     * @Route("/lascuola/cours/batterie/{id}", name="scuola_cours_batterie")
     */
    public function batterie (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }
                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/batterie.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/batterie.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }



    /**
     * @Route("/lascuola/cours/chant/{id}", name="scuola_cours_chant")
     */
    public function chant (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);
        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/chant.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/chant.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }


    /**
     * @Route("/lascuola/cours/guitare/{id}", name="scuola_cours_guitare")
     */
    public function guitare (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }
                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/guitare.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/guitare.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }



    /**
     * @Route("/lascuola/cours/flute/{id}", name="scuola_cours_flute")
     */
    public function flute (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/flute.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/flute.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }



    /**
     * @Route("/lascuola/cours/saxo/{id}", name="scuola_cours_saxo")
     */
    public function saxo (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/saxophone.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/saxophone.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }



    /**
     * @Route("/lascuola/cours/violon/{id}", name="scuola_cours_violon")
     */
    public function violon (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/violon.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/violon.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,
        ]);
    }




    /**
     * @Route("/lascuola/cours/piano/{id}", name="scuola_cours_piano")
     */
    public function piano (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/piano.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/piano.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }




    /**
     * @Route("/lascuola/cours/basse/{id}", name="scuola_cours_basse")
     */
    public function basse (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/basse.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/basse.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }




    /**
     * @Route("/lascuola/cours/violoncelle/{id}", name="scuola_cours_violoncelle")
     */
    public function violoncelle (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/violoncelle.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/violoncelle.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }




    /**
     * @Route("/lascuola/cours/chorale/{id}", name="scuola_cours_chorale")
     */
    public function chorale (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/chorale.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/chorale.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }



    /**
     * @Route("/lascuola/cours/quator/{id}", name="scuola_cours_quator")
     */
    public function quator (Request $request, $id, CategorieRepository $categorieRepository, Categorie $lacategorie)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $categorieRepository=$em->getRepository(Categorie::class);
        $categorieby=$categorieRepository->find($id);
        
        $formulaireCategorie=$this->createForm(CategorieType::class,$categorieby);

        $formulaireCategorie
        ->add('Modifier', SubmitType::class, array('label'=>'Ajouter'))
        ->add('nomCategorie');

        $formulaireCategorie->handleRequest($request);

        $img=$categorieby->getPhotoCours();
        
        if( $request->isMethod('post') && $formulaireCategorie->isValid() ) 
        {
                $file=$formulaireCategorie['photoCours']->getData();
                if(!is_string($file)) 
                    {
                        $filename=$file->getClientOriginalName();
                        $file->move($this->getParameter('emplacement_image_cours'),
                        $filename);
                        $categorieby->setPhotoCours($filename);
                    }

                    else 
                    {
                        $categorieby->setPhotoCours($img);
                    }

                    $em->persist($categorieby);
                    $em->flush();
                    return $this->render('scuola/cours/quator.html.twig', [
                        'form_insert' => $formulaireCategorie->createView(),
                        'cours' => $categorieby,
                        'lacategorie' => $lacategorie,
                        
                    ]);
                
        }

        return $this->render('scuola/cours/quator.html.twig', [
            'form_insert' => $formulaireCategorie->createView(),
            'cours' => $categorieby,
            'lacategorie' => $lacategorie,

        ]);

    }


}
