<?php

namespace App\Controller;

use PDO;

use App\Entity\Cpville;
use App\Repository\CpvilleRepository;
use App\Repository\RegionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;





/** @Route("/admin") 
 * 
 * 
 */ 
class CpvilleController extends AbstractController
{
    /**
     * @Route("/maville/{leCode}", name="villes")
     */
    public function villes(Request $request,$leCode)
    {
        $em=$this->getDoctrine()->getManager();
        $cpvilleRepository=$em->getRepository(Cpville::class);
        //findOneBy à privilégier plutot que findBy pour ne pas avoir une réponse en
        //array et être ainsi obligé de faire une boucle. 
        //avec findOneBy je peux faire mon get facilement.
        $laVille=$cpvilleRepository->findOneBy(array('codePostal' => $leCode));
        
        if ($laVille)
        {
            /*
            foreach($laVille as $cle=>$val)
            {
                $affiche=$val;
            }
            */
            
            $affiche=$laVille->getVille();
        }

        else 
        $affiche="";
        $codePost="";
        
        //JsonResponse retourne une valeur en Json. ex: {"ville":"Aulnay-sous-Bois"}
        $response = new JsonResponse();
        //affichage au format json (paramètre (comme ville) obligatoire)
        return $response->setData(array('ville'=>$affiche, 'cp'=>$leCode));

        
        //ou die($affiche)
        /*
        return new Response(<<<EOF
        <html>
            <body>
            $affichage
            </body>
        </html>
        EOF
        );
        */
    }
    

}











