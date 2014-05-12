<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Remboursement;
use ETAP\EmpruntBundle\Form\RemboursementType;

/**
 * Remboursement controller.
 *
 */
class RemboursementController extends Controller
{
    
    function __construct() {
        $this->current = 4;
        $this->section = 4;  
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify  = '';     
    }
    
    public function generateRemboursementAction()
    {
        $this->choice = 441;
        $em = $this->getDoctrine()->getManager();
        $entities_contrats = $em->getRepository('EmpruntBundle:Contrat')->findAll();

        return $this->render('EmpruntBundle:Remboursement:generateRemboursement.html.twig', array(
            'entities_contrats' => $entities_contrats,
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice
        ));
    }
    
    public function consulterRemboursementParTirageAction()
    {
        $this->choice = 442;
        $em = $this->getDoctrine()->getManager();

        $entities_contrats = $em->getRepository('EmpruntBundle:Contrat')->findAll();
        $entities_tirages = $em->getRepository('EmpruntBundle:Tirage')->findAll();
        return $this->render('EmpruntBundle:Remboursement:consulterRemboursementParTirage.html.twig', array(
            'entities_contrats' => $entities_contrats,
            'entities_tirages' => $entities_tirages,
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice            
        ));
    }
    
    public function repartitionParConcessionAction()
    {
        $this->choice = 443;
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Remboursement')->findAll();

        return $this->render('EmpruntBundle:Remboursement:repartitionParConcession.html.twig', array(
            'entities' => $entities,
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice                
        ));
    }    
    
    public function consulterRemboursementParConcessionAction()
    {
        $this->choice = 444;
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Remboursement')->findAll();

        return $this->render('EmpruntBundle:Remboursement:consulterRemboursementParConcession.html.twig', array(
            'entities' => $entities,
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice                
        ));
    }       
}
