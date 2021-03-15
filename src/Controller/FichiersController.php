<?php

namespace App\Controller;

use App\Entity\Fichiers;
use App\Entity\Professeur;
use App\Form\FichiersType;
use App\Repository\FichiersRepository;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/fichiers")
 */
class FichiersController extends AbstractController
{
    /**
     * @Route("/{id}/edit", name="fichiers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fichiers $fichier): Response
    {
        $form = $this->createForm(FichiersType::class, $fichier);
        $form->handleRequest($request);

        $fichier=$professeur->getFichiers()->getFichier();

        $formFichier=$this->createForm(FichiersType::class);
        $formFichier
        ->add('Ajouter', SubmitType::class, ['label'=>'Valider la modification']);
        $formFichier->handleRequest($request);

        if ($request->isMethod('post') && $formFichier->isValid())
        {
            $file=$formFichier['fichier']->getData();

            if(!is_string($file)) 
            {
                $filename=$file->getClientOriginalName();
                $file->move($this->getParameter('emplacement_docs'),
                $filename);
                $professeur->setPhotoProf($filename);
                $professeur->getFichiers()->setFichier($filename);
            }

            else 
            {
                $professeur->setPhotoProf($fichier);
            }

            $em->persist($professeur);
            $em->flush();
            $session=$request->getSession();
            $session->getFlashBag()->add('message','Les modifications ont bien été prises en compte');
            $session->set('statut','warning');

        }

        return $this->render('fichiers/edit.html.twig', [
            'fichier' => $fichier,
            'form' => $formFichier->createView(),
        ]);
    }


}
