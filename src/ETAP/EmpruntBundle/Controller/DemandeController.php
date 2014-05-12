<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ETAP\EmpruntBundle\Entity\Demande;
use ETAP\EmpruntBundle\Form\DemandeType;
use ETAP\EmpruntBundle\Form\AddDemandeType;

/**
 * Demande controller.
 *
 */
class DemandeController extends Controller {

    function __construct() {
        $this->current = 1;
        $this->section = 1;
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify  = '';     
    }
        
    /**
     * Lists all Demande entities.
     *
     */
    public function consulterDemandeAction() {
        $this->choice = 112;
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Demande')->findAll();
        return $this->render('EmpruntBundle:Demande:consulterDemande.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,                
        ));
    }

    /**
     * Displays a form to create a new Demande entity.
     *
     */
    public function ajouterDemandeAction(Request $request) {
        $this->choice = 111;
        $entity = new Demande();
        $form = $this->createForm(new AddDemandeType(), $entity);
        
        if( $request->isMethod("POST")){
            $form->bind($request);// Lier les données de la requête au formulaire .     
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                $this->class_alert = 'msgsuccess';
                $this->notify = "La demande a été ajoutée avec succès";      
                $entity = new Demande();
                $form = $this->createForm(new AddDemandeType(), $entity);
//                return $this->render('EmpruntBundle:Demande:ajouterDemande.html.twig', array(
//                            'entity' => new Demande(),
//                            'current' => $this->current,
//                            'section' => $this->section,
//                            'choice' => $this->choice,                
//                            'class_alert' => 'msgsuccess',
//                            'notify' => 'La demande a été ajoutée avec succès',
//                            'form' => $this->createForm(new AddDemandeType(), new Demande())->createView(),
//                ));
            }else{
                    $this->class_alert = 'msgerror';
                    $this->notify = "Veuillez vérifier les champs :/"; 
            }  
        }   
       
        return $this->render('EmpruntBundle:Demande:ajouterDemande.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice,
            'class_alert' => $this->class_alert,
            'notify' => $this->notify,
        ));
        
    }
    
    public function displayRequestFormAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EmpruntBundle:Demande')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Demande entity.');
        }
        $form = $this->createForm(new DemandeType(), $entity);
        return $this->render('EmpruntBundle:Demande:displayRequestForm.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'current' => $this->current,
                    'section' => $this->section  
        ));
    }

    public function modifierDemandeAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Demande')->findAll();
        $entity = $em->getRepository('EmpruntBundle:Demande')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Demande entity.');
        }
        $editForm = $this->createForm(new AddDemandeType(), $entity);
        if( $request->isMethod("POST")){
            $editForm->bind($request);
            if ($editForm->isValid()) {
                $em->persist($entity);
                $em->flush();
                $this->class_alert = 'msgsuccess';
                $this->notify = "La demande a été modifiée avec succès";                          
            }else{
                $this->class_alert = 'msgerror';
                $this->notify = "Veuillez vérifier les champs :/"; 
            }             
        }
        return $this->render('EmpruntBundle:Demande:consulterDemande.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice, 
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify
        )); 
    }
    
}
