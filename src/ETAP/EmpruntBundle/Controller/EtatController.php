<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Demande controller.
 *
 */
class   EtatController extends Controller {

    function __construct() {
        $this->current = 6;
        $this->section = 6;
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify  = '';     
    }
    
    public function consulterEtatsAction() {
        $this->choice = 661;
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Demande')->findAll();
        return $this->render('EmpruntBundle:Etat:consulterEtats.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }
}
