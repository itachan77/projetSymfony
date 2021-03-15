<?php

namespace App\Controller\siteScuolaController;

use App\Entity\Actualite;
use App\Form\ActualiteType;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActuController extends AbstractController
{

    /**
     * @Route("/lascuola/actualite", name="scuola_actualite")
     */
    public function actualite (Request $request, ActualiteRepository $actualiteRepository)
    {
        $actualite=new Actualite;
        $formulaireActualite=$this->createForm(ActualiteType::class,$actualite);

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $actualiteRepository=$em->getRepository(Actualite::class);
        $listeactualite=$actualiteRepository->findAll();
        
        $resultat=[];
        foreach($listeactualite as $val) {
            array_push($resultat,$val->getMoisAnnee());
        }

        $formulaireActualite
        ->add('ajouter', SubmitType::class, array('label'=>'Ajouter'));

        $formulaireActualite->handleRequest($request);

        //La validation sur une fiche
        if($request->isMethod('post'))
        {
                if($formulaireActualite->isValid()) 
                {
                    $em->persist($actualite);
                    $em->flush();

                    return $this->render('scuola/actualite/actualite.html.twig', [
                        'form_insert' => $formulaireActualite->createView(),
                        'actualite' => $actualite,
                        'actualiteall' => $actualiteRepository->findAll(),
                    ]);
                }
        }

        return $this->render('scuola/actualite/actualite.html.twig', [
            'form_insert' => $formulaireActualite->createView(),
            'actualite' => $actualite,
            'actualiteall' => $actualiteRepository->findAll(),
        ]);

    }





    /**
     * @Route("/lascuola/actualite/update/{id}", name="actualite_update")
     */
    public function update(Request $request, $id, ActualiteRepository $actualiteRepository, Actualite $actualite)
    {
        $formulaireActualite=$this->createForm(ActualiteType::class,$actualite);

        //Je récupère la liste des catégorie de la base de données et je stocke cette liste dans uen variable
        $em=$this->getDoctrine()->getManager();
        $actualiteRepository=$em->getRepository(Actualite::class);
        $actualite=$actualiteRepository->find($id);

        //Je rajoute dans le formulaire un champ de type submit pour valider la modification du formulaire
        //Si un bouton submit n'est pas intégré ici, symfony génère lui meme un submit dans le twig
        $formulaireActualite
        ->add('modifier', SubmitType::class, ['label'=>'Modifier']);

        $formulaireActualite->handleRequest($request);

        if( $request->isMethod('post') && $formulaireActualite->isValid() ) 
        {
            $em->persist($actualite);
            $em->flush();
        //    $session=$request->getSession();
        //    $session->getFlashBag()->add('message','le Produit a été mis à jour');
        //    $session->set('statut','success');
        return $this->redirect($this->generateUrl('scuola_actualite'));
        }


        return $this->render('scuola/actualite/actualite_update.html.twig', [
            'form_update' => $formulaireActualite->createView(),
            'actualiteall' => $actualiteRepository->findAll(),

        ]);

    }






    /**
     * @Route("/lascuola/actualite/delete/{id}", name="actualite_delete")
     */
    public function delete(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $actualiteRepository=$em->getRepository(Actualite::class);
        $actualite=$actualiteRepository->find($id);
        $em->remove($actualite);
        $em->flush();
        // $session=$request->getSession();
        // $session->getFlashBag()->add('message','La fiche a bien été supprimée');
        // $session->set('statut','success');
        return $this->redirect($this->generateUrl('scuola_actualite'));

    }





}
