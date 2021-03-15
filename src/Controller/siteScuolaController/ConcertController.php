<?php

namespace App\Controller\siteScuolaController;

use App\Entity\ImgCi;
use App\Entity\ImgGp;
use App\Entity\ImgProf;
use App\Form\ImgCiType;
use App\Entity\ConcertGp;
use App\Entity\ConcertInd;
use App\Entity\Professeur;
use App\Entity\ConcertProf;
use App\Form\ConcertIndType;
use App\Form\ProfesseurType;
use App\Repository\ImgCiRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConcertController extends AbstractController
{

    /**
     * @Route("scuola/spectacle/cg", name="scuola_spectacleCg")
     */
    public function concertCg (Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $concertIndRepository=$em->getRepository(ConcertInd::class);
        $Spectacle=$concertIndRepository->find(2);

        $imgCi=new ImgCi;

        $imagesRepository=$em->getRepository(ImgCi::class);
        $images=$Spectacle->getImgCi();

        $formulaireConcert=$this->createForm(ConcertIndType::class,$Spectacle);

        $formulaireConcert
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));
        
        $formulaireConcert->handleRequest($request);

        //La validation sur une fiche
        if( $request->isMethod('post') && $formulaireConcert->isValid()) 
        {
            $file=$formulaireConcert['imgTmpConcertInd']->getData();

            if(!is_string($file)) {
                $filename=$file->getClientOriginalName();
                $file->move($this->getParameter('emplacement_concertCg'),   
                $filename);
                $imgCi->setNomImgCi($filename);

                $em->persist($imgCi);
                $em->flush();

                $img=$imagesRepository->findOneBy(array('nomImgCi'=>$filename));
                $Spectacle->addImgCi($img); //$Spectacle correspond à l'enregistrement de la table ConcertInd
            }

            $em->persist($Spectacle);
            $em->flush();

            return $this->render('scuola/concert/cgroupe.html.twig', [
                'form_update' => $formulaireConcert->createView(),
                //'form_insertImg' => $formulaireImgCi->createView(),
                'spectacle' => $Spectacle,
                'images' => $images,
            ]);
        }

        return $this->render('scuola/concert/cgroupe.html.twig', [
            'form_update' => $formulaireConcert->createView(),
            //'form_insertImg' => $formulaireImgCi->createView(),
            'spectacle' => $Spectacle,
            'images' => $images,
        ]);
    }


    /**
     * @Route("scuola/spectacle/ci", name="scuola_spectacleCi")
     */
    public function concertCi (Request $request)
    {
        //cette méthode modifie le contenu de la page de concert individuel
        //Pas besoin de préciser l'$id dans les paramètres puisque l'$id est
        //toujours la même(1)- un seul et unique enregistrement pour le 
        // concert individuel

        $em=$this->getDoctrine()->getManager();
        $concertIndRepository=$em->getRepository(ConcertInd::class);
        $Spectacle=$concertIndRepository->find(1);

        $imgCi=new ImgCi;
        
        $imagesRepository=$em->getRepository(ImgCi::class);
        $images=$Spectacle->getImgCi();
        

            //très important:(plusieurs heures, un dimanche de gâché) 
            //associe à l'enregistrement 30 de l'entité ImgCi l'enregistrement 1 de l'entité
            //concertInd.
            // $img=$imagesRepository->find(30);
            // $Spectacle->addImgCi($img);
            // $em->persist($Spectacle);
            // $em->flush();

        //A partir du nom de l'image de la photo (ex:monimage.jpg), je peux mettre à jour (associer les deux tables en mettant 1 à ImgCi)
        // la table ImgCi.

                /*
                $img=$imagesRepository->findOneBy(array('nomImgCi'=>'monimage.jpg'));
                $Spectacle->addImgCi($img); //$Spectacle correspond à l'enregistrement de la table ConcertInd
                $em->persist($Spectacle);
                $em->flush();
                */
        //monimage.jpg peut être remplacé par une variable qu'on mettra dans $img à la place de monimage.jpg
                //$image_ci="monimage.jpg";

        //cette image sous forme de variable peut être aussi récupérée classiquement par un insert
        // où on inclut une photo (ex:espace administrateur gestion des élèves)
        // dans l'exemple ci-dessous, le nom d'image sous forme de variable pourrait être par
        //exemple : $filename.

        //Nous allons donc tenter de reproduire les instructions ci-après pour 
        //récupérer le nom de l'image et le mettre dans notre $img.

                /*
                        $em=$this->getDoctrine()->getManager();
                        $file=$formulaireEleve['photoEleve']->getData();

                        if(!is_string($file)) 
                        {
                            $filename=$file->getClientOriginalName();
                            $file->move($this->getParameter('emplacement_image'),
                            $filename);
                            $eleve->setPhotoEleve($filename);
                        }
                        $em->persist($eleve);
                        $em->flush();
                */

        //déclaration du formulaire du concert individuel
        $formulaireConcert=$this->createForm(ConcertIndType::class,$Spectacle);

        $formulaireConcert
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));
        
        $formulaireConcert->handleRequest($request);

        //La validation sur une fiche
        if( $request->isMethod('post') && $formulaireConcert->isValid()) 
        {
            $file=$formulaireConcert['imgTmpConcertInd']->getData();

            if(!is_string($file)) 
            {
                $filename=$file->getClientOriginalName();
                $file->move($this->getParameter('emplacement_concertCi'),   
                $filename);
                $imgCi->setNomImgCi($filename);

                $em->persist($imgCi);
                $em->flush();
                
                //$filename correspond au nouveau fichier qui vient d'être uploadé.
                //il est toutefois disponible pour cette recherche suivante car avant, 
                //il y a eu persistance. 
                //Grace au add (ici addImgCi), l'information de l'id du type de concert 
                //est inscrite dans la table ImgCie 
                $img=$imagesRepository->findOneBy(array('nomImgCi'=>$filename));
                $Spectacle->addImgCi($img); //$Spectacle correspond à l'enregistrement de la table ConcertInd

            }
            $em->persist($Spectacle);
            $em->flush();

            return $this->render('scuola/concert/cindiv.html.twig', [
                'form_update' => $formulaireConcert->createView(),
                //'form_insertImg' => $formulaireImgCi->createView(),
                'spectacle' => $Spectacle,
                'images' => $images,
            ]);

        }

        return $this->render('scuola/concert/cindiv.html.twig', [
            'form_update' => $formulaireConcert->createView(),
            //'form_insertImg' => $formulaireImgCi->createView(),
            'spectacle' => $Spectacle,
            'images' => $images,
        ]);
    }

    /**
     * @Route("/scuola/spectacleCi/delete/{id}", name="spectacleCi_delete")
     */
    public function spectacleCi_delete (Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $imagesCiRepository=$em->getRepository(ImgCi::class);
        $delimagesCi=$imagesCiRepository->find($id);
        $em->remove($delimagesCi);
        $em->flush();
        return $this->redirect($this->generateUrl('scuola_spectacleCi'));
    }


    /**
     * @Route("/scuola/spectacleCg/delete/{id}", name="spectacleCg_delete")
     */
    public function spectacleCg_delete (Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $imagesCiRepository=$em->getRepository(ImgCi::class);
        $delimagesCi=$imagesCiRepository->find($id);
        $em->remove($delimagesCi);
        $em->flush();
        return $this->redirect($this->generateUrl('scuola_spectacleCg'));
    }


/*********************************************PAGE CONCERT DES PROFESSEURS*********************************** */

    /**
     * @Route("scuola/spectacle/cp", name="scuola_spectacleCp")
     */
    public function concertCp (Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $concertIndRepository=$em->getRepository(ConcertInd::class);
        $Spectacle=$concertIndRepository->find(3);

        $imgCi=new ImgCi;
        
        $imagesRepository=$em->getRepository(ImgCi::class);
        $images=$Spectacle->getImgCi();

        $formulaireConcert=$this->createForm(ConcertIndType::class,$Spectacle);

        $formulaireConcert
        ->add('Modifier', SubmitType::class, array('label'=>'Modifier'));
        
        $formulaireConcert->handleRequest($request);

        //La validation sur une fiche
        if( $request->isMethod('post') && $formulaireConcert->isValid()) 
        {
            $file=$formulaireConcert['imgTmpConcertInd']->getData();

            if(!is_string($file)) 
            {
                $filename=$file->getClientOriginalName();
                $file->move($this->getParameter('emplacement_concertCp'),   
                $filename);
                $imgCi->setNomImgCi($filename);
            }

            $em->persist($imgCi);
            $em->flush();

            $img=$imagesRepository->findOneBy(array('nomImgCi'=>$filename));
            $Spectacle->addImgCi($img); //$Spectacle correspond à l'enregistrement de la table ConcertInd
            $em->persist($Spectacle);
            $em->flush();

            return $this->render('scuola/concert/cprof.html.twig', [
                'form_update' => $formulaireConcert->createView(),
                //'form_insertImg' => $formulaireImgCi->createView(),
                'spectacle' => $Spectacle,
                'images' => $images,
            ]);

        }

        return $this->render('scuola/concert/cprof.html.twig', [
            'form_update' => $formulaireConcert->createView(),
            //'form_insertImg' => $formulaireImgCi->createView(),
            'spectacle' => $Spectacle,
            'images' => $images,

        ]);

    }

        /**
     * @Route("/scuola/spectacleCp/delete/{id}", name="spectacleCp_delete")
     */
    public function spectacleCP_delete (Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $imagesCiRepository=$em->getRepository(ImgCi::class);
        $delimagesCi=$imagesCiRepository->find($id);
        $em->remove($delimagesCi);
        $em->flush();
        return $this->redirect($this->generateUrl('scuola_spectacleCp'));
    }
























    }







?>