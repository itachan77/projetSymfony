<?php

namespace App\Controller\siteScuolaController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TarifController extends AbstractController
{
    /**
     * @Route("/scuola/tarifs", name="scuola_tarifs")
     */
    public function index(): Response
    {


        return $this->render('scuola/tarifs/tarifs.html.twig', [

        ]);
    }
}
