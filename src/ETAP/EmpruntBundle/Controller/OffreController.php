<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Offre;
use ETAP\EmpruntBundle\Form\OffreType;

/**
 * Offre controller.
 *
 */
class OffreController extends Controller
{
    
    function __construct() {
        $this->current = 1;
        $this->section = 1;  
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify  = '';     
    }
    /**
     * Lists all Offre entities.
     *
     */
    public function consulterOffreAction()
    {
        $this->choice = 114;
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Offre')->findAll();

        return $this->render('EmpruntBundle:Offre:consulterOffre.html.twig', array(
            'entities' => $entities,
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice
        ));
    }

    /**
     * Creates a new Offre entity.
     *
     */
    public function ajouterOffreAction(Request $request)
    {
        $this->choice = 113;
        $entity  = new Offre();
        $form = $this->createForm(new OffreType(), $entity);
        
        if( $request->isMethod("POST")){
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->render('EmpruntBundle:Offre:ajouterOffre.html.twig', array(
                            'entity' => new Offre(),
                            'current' => $this->current,
                            'section' => $this->section,                
                            'class_alert' => 'msgsuccess',
                            'notify' => 'Offre ajoutée avec succès',
                            'form' => $this->createForm(new OffreType(), $entity)->createView(),
                ));
            }
            else{
                    $this->class_alert = 'msgerror';
                    $this->notify = "Veuillez vérifier les champs :/"; 
            }  
        } 

        return $this->render('EmpruntBundle:Offre:ajouterOffre.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'current' => $this->current,
            'section' => $this->section,
            'class_alert' => $this->class_alert,
            'notify' => $this->notify,
            'choice' => $this->choice
        ));
    }
    
    public function displayOfferFormAction($id) {
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $form = $this->createForm(new OffreType(), $entity);

        return $this->render('EmpruntBundle:Offre:displayOfferForm.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }
    
    public function displayOfferListAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();        
//        $entities = $em->getRepository('EmpruntBundle:Offre')->findByIddemande($id)->orderByMarge()->desc();
        $entities   = $em->getRepository('EmpruntBundle:Offre')->findByIddemande($id);
        $offer      = $em->getRepository('EmpruntBundle:Offre')->findOneBy(array(), array('marge' => 'asc'));
        return $this->render('EmpruntBundle:Offre:displayOfferList.html.twig', array(
            'entities' => $entities,
            'offer' => $offer
        )); 
    }    
    
    public function depouillementAction(Request $request) {
        $this->choice = 115;
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Demande')->findAll();
        return $this->render('EmpruntBundle:Offre:depouillement.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }
    
}
