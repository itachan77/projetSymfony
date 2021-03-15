<?php

namespace App\Controller\espaceController;


use DateTime;
use App\Entity\Calendar;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiCalendController extends AbstractController
{
    /**
     * @Route("/professeur/espace/calend/{id}/edit", name="apiCalendEdit", methods={"PUT"})
     */
    public function majEvent(?Calendar $calendar, Request $request)
    {
        //?signifie qu'on peut ne pas spécifier l'id dans la route
        //methods put signifie que la méthode majEvent n'est pas disponible depuis le
        //lien du navigateur, c'est à dire depuis la méthode get
        //pour une requete put, on doit obligatoirement récupérer toutes données:


        //on récupère donc toutes les données : 
        $donnees = json_decode($request->getContent());

        if(
        isset($donnees->title) && !empty($donnees->title) &&
        isset($donnees->start) && !empty($donnees->start) &&
        isset($donnees->description) && !empty($donnees->description) &&
        isset($donnees->backgroundColor) && !empty($donnees->backgroundColor) &&
        isset($donnees->borderColor) && !empty($donnees->borderColor) &&
        isset($donnees->textColor) && !empty($donnees->textColor)
        )
        {
            //les données sont complètes
            // on initialise un code : 
            $code = 200;

            //On vérifie si l'id existe
            if(!$calendar) {
                //on instancie un rendez-vous 
                $calendar = new Calendar;

                //On chage le code
                $code = 201;
            }

            //On hydrate l'objet avec les données
            $calendar->setTitle($donnees->title);
            $calendar->setDescription($donnees->description);
            $calendar->setStart(new DateTime($donnees->start));
            if($donnees->allDay) {
                $calendar->setEnd(new DateTime($donnees->start));
            }else {
                $calendar->setEnd(new DateTime($donnees->end));
            }
            $calendar->setAllDay($donnees->allDay);
            $calendar->setBackgroundColor($donnees->backgroundColor);
            $calendar->setBorderColor($donnees->borderColor);
            $calendar->setTextColor($donnees->textColor);

            $em = $this->getDoctrine()->getManager();
            $em->persist($calendar);
            $em->flush();

            // On retourne le code
            return new Response('OK',$code);
    
        } 
        else {
            //les données sont incomplètes
            return new Response('Données incomplètes',404);
        }
        
    }  

    /**
     * @Route("/professeur/espace/calend/{id}/get", name="apiCalendGet", methods={"GET"})
     */
    public function GetCalend(?Calendar $calendar, Request $request)
    {
        //?signifie qu'on peut ne pas spécifier l'id dans la route
        //methods put signifie que la méthode majEvent n'est pas disponible depuis le
        //lien du navigateur, c'est à dire depuis la méthode get
        //pour une requete put, on doit obligatoirement récupérer toutes données:


        //on récupère donc toutes les données : 
        $donnees = json_decode($request->getContent());

        if(
        isset($donnees->title) && !empty($donnees->title) &&
        isset($donnees->start) && !empty($donnees->start) &&
        isset($donnees->description) && !empty($donnees->description) &&
        isset($donnees->backgroundColor) && !empty($donnees->backgroundColor) &&
        isset($donnees->borderColor) && !empty($donnees->borderColor) &&
        isset($donnees->textColor) && !empty($donnees->textColor)
        )
        {
            //les données sont complètes
            // on initialise un code : 
            $code = 200;

            //On vérifie si l'id existe
            if(!$calendar) {
                //on instancie un rendez-vous 
                $calendar = new Calendar;

                //On chage le code
                $code = 201;
            }


            // On retourne le code
            return new Response('OK',$code);
    
        } 
        else {
            //les données sont incomplètes
            return new Response('Données incomplètes',404);
        }
        
    }  
    
    
}
