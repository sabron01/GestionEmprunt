<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Concession;
use ETAP\EmpruntBundle\Form\ConcessionType;
use ETAP\EmpruntBundle\Form\AddConcessionType;

/**
 * Concession controller.
 *
 */
class ConcessionController extends Controller
{
    
    function __construct() {
        $this->current = 2;
        $this->section = 2;  
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify  = '';     
    }

    public function consulterConcessionAction() {
        $this->choice = 223;
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Concession')->findAll();
        return $this->render('EmpruntBundle:Concession:consulterConcession.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }
    
    public function ajouterConcessionAction(Request $request) {
        $this->choice = 224;
        $entity = new Concession();
        $form = $this->createForm(new AddConcessionType(), $entity);
        
        if( $request->isMethod("POST")){
            
            $form->bind($request);// Lier les données de la requête au formulaire .     
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                $this->class_alert = 'msgsuccess';
                $this->notify = "La concession a été ajoutée avec succès";  
                $entity = new Concession();
                $form = $this->createForm(new AddConcessionType(), $entity);                
            }else{
                    $this->class_alert = 'msgerror';
                    $this->notify = "Veuillez vérifier les champs :/"; 
            }  
        }   
       
        return $this->render('EmpruntBundle:Concession:ajouterConcession.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice,
            'class_alert' => $this->class_alert,
            'notify' => $this->notify,
        ));
        
    }

    public function displayConcessionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EmpruntBundle:Concession')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concession entity.');
        }
        $form = $this->createForm(new ConcessionType(), $entity);
        return $this->render('EmpruntBundle:Concession:displayConcession.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }
    
}
