<?php

namespace App\EventSubscriber;

use Twig\Environment;
use App\Repository\EleveRepository;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TwigEventSubscriber implements EventSubscriberInterface
{

    private $twig;
    private $conferenceRepository;

    public function __construct(Environment $twig, EleveRepository $eleveRepository)
    {
        $this->twig = $twig;
        $this->eleveRepository = $eleveRepository;
    }


    public function onControllerEvent(ControllerEvent $event) 
    {
        $this->twig->addGlobal('eleves', $this->eleveRepository->findAll());
    }


    public function onKernelController(ControllerEvent $event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}
