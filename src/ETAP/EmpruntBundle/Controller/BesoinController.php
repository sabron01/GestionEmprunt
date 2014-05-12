<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Besoin;
use ETAP\EmpruntBundle\Form\BesoinType;
use ETAP\EmpruntBundle\Form\AddBesoinType;

/**
 * Besoin controller.
 *
 */
class BesoinController extends Controller
{
    
    function __construct() {
        $this->current = 2;
        $this->section = 2;  
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify  = '';     
    }

    public function consulterBesoinAction() {
        $this->choice = 221;
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Besoin')->findAll();
        return $this->render('EmpruntBundle:Besoin:consulterBesoin.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }
    
    public function ajouterBesoinAction(Request $request) {
        $this->choice = 222;
        $entity = new Besoin();
        $form = $this->createForm(new AddBesoinType(), $entity);
        
        if( $request->isMethod("POST")){
            
            $form->bind($request);// Lier les données de la requête au formulaire .     
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                return $this->render('EmpruntBundle:Besoin:ajouterBesoin.html.twig', array(
                            'entity' => new Besoin(),
                            'current' => $this->current,
                            'section' => $this->section,
                            'choice' => $this->choice,                
                            'class_alert' => 'msgsuccess',
                            'notify' => 'Le besoin a été ajoutée avec succès',
                            'form' => $this->createForm(new AddBesoinType(), $entity)->createView(),
                ));
            }else{
                    $this->class_alert = 'msgerror';
                    $this->notify = "Veuillez vérifier les champs :/"; 
            }  
        }   
       
        return $this->render('EmpruntBundle:Besoin:ajouterBesoin.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'current' => $this->current,
            'section' => $this->section,
            'class_alert' => $this->class_alert,
            'notify' => $this->notify,
            'choice' => $this->choice
        ));
        
    }

    public function displayBesoinAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Besoin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Besoin entity.');
        }

        $form = $this->createForm(new BesoinType(), $entity);

        return $this->render('EmpruntBundle:Besoin:displayBesoin.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }
    
}
