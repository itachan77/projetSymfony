<?php

namespace App\Controller\adminController;

use App\Repository\EleveRepository;
use App\Repository\ProfesseurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEspaceController extends AbstractController
{
    /**
     * @Route("/admin/espaceProfAdmin", name="espaceProfAdmin")
     */
    public function espaceProfAdmin(ProfesseurRepository $professeurRepository): Response
    {
        $professeurs=$professeurRepository->findAll();

        return $this->render('admin/espaceProfAdmin.html.twig', [
            'professeurs' => $professeurs,
        ]);

    }


    /**
     * @Route("/admin/espaceEleveAdmin", name="espaceEleveAdmin")
     */
    public function espaceEleveAdmin(EleveRepository $eleveRepository): Response
    {
        $eleves=$eleveRepository->findAll();
        
        return $this->render('admin/espaceEleveAdmin.html.twig', [
            'eleves' => $eleves,
        ]);
    }


}
