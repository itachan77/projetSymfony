<?php

namespace App\Controller\siteScuolaController;


use App\Entity\Slides;
use App\Form\SlidesType;

use App\Repository\SlidesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{


    /**
     * @Route("/", name="scuola_index")
     */
    public function slides_insert (Request $request, SlidesRepository $slidesRepository)
    {

        $slides=new Slides;

        //Je récupère la liste des slides de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $slidesRepository=$em->getRepository(Slides::class, $slides);
        $listeSlides=$slidesRepository->findAll();
        
        $formulaireSlides=$this->createForm(SlidesType::class);

        $formulaireSlides
        ->add('ajouter', SubmitType::class, array('label'=>'Ajouter (dimensions : 2021x331 px)'));

        $formulaireSlides->handleRequest($request);

        //La validation sur une fiche
        if($request->isMethod('post'))
        {
            if($formulaireSlides->isValid()) 
            {
                $file=$formulaireSlides['fichierSlide']->getData();

                if(!is_string($file)) 
                {
                    $filename=$file->getClientOriginalName();
                    $file->move($this->getParameter('emplacement_image_scuola'),   
                    $filename);
                    $slides->setFichierSlide($filename);
                }

                else 
                {
                    return $this->redirect($this->generateUrl('scuola_index'));
                }

            $em->persist($slides);
            $em->flush();

            }
        return $this->render('scuola/index.html.twig', [
            'form_insert' => $formulaireSlides->createView(),
            'unSlide' => $slides,
            'SlidesAll' => $listeSlides
        ]);
        }

        return $this->render('scuola/index.html.twig', [
            'form_insert' => $formulaireSlides->createView(),
            'unSlide' => $slides,
            'SlidesAll' => $listeSlides
        ]);

    }


    /**
     * @Route("/scuola/index/delete/{id}", name="scuola_slide_delete")
     */
    public function slides_delete (Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $slidesRepository=$em->getRepository(Slides::class);
        $delSlides=$slidesRepository->find($id);
        $em->remove($delSlides);
        $em->flush();
        return $this->redirect($this->generateUrl('scuola_index'));
    }

    /**
     * @Route("/scuola/index/update/{id}", name="scuola_index_update")
     */
    public function slides_update (Request $request, $id, SlidesRepository $slidesRepository)
    {

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $slidesRepository=$em->getRepository(Slides::class);
        $slide=$slidesRepository->find($id);
        $listeSlides=$slidesRepository->findAll();
        
        $formulaireSlides=$this->createForm(SlidesType::class,$slide);

        $formulaireSlides
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));

        $formulaireSlides->handleRequest($request);

        $fichier=$slide->getFichierSlide();


        //La validation sur une fiche
        if($request->isMethod('post'))
        {
                if($formulaireSlides->isValid()) 
                {
                    $file=$formulaireSlides['fichierSlide']->getData();
                    if(!is_string($file)) 
                        {
                            $filename=$file->getClientOriginalName();
                            $file->move($this->getParameter('emplacement_image_scuola'),   
                            $filename);
                            $slide->setFichierSlide($filename);
                        }
                }

                else {
                    $slide->setFichiersSlide($fichier);
                }

                $em->persist($slide);
                $em->flush();

                return $this->render('scuola/index.html.twig', [
                    'form_update' => $formulaireSlides->createView(),
                    'unSlide' => $slide,
                    'SlidesAll' => $listeSlides
                ]);
        }

        
        return $this->render('scuola/index.html.twig', [
            'form_update' => $formulaireSlides->createView(),
            'unSlide' => $slide,
            'SlidesAll' => $listeSlides
        ]);

    }















}














