<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Contrat;
use ETAP\EmpruntBundle\Form\AddContratType;

use ETAP\EmpruntBundle\Entity\Tirage;
use ETAP\EmpruntBundle\Form\AddTirageType;

use ETAP\EmpruntBundle\Entity\Commission;
use ETAP\EmpruntBundle\Form\AddCommissionType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * Contrat controller.
 *
 */
/**
     * 
     * @Template
     */
class ContratController extends Controller
{
    
    function __construct() {
        $this->current = 3;
        $this->section = 3;  
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify  = '';     
    }
    
    /**
     * Lists all Contrat entities.
     *
     */
    public function consulterContratAction() {
        $this->choice = 332;
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Contrat')->findAll();
        return $this->render('EmpruntBundle:Contrat:consulterContrat.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }

    /**
     * Creates a new Contrat entity.
     *
     */
    public function ajouterContratAction(Request $request) {
        $this->choice = 331;
//        $entity_contrat = new \ETAP\EmpruntBundle\Entity\Convention();
//        $form_contrat = $this->createForm(new ConventionType(), $entity_contrat);

        $entity_contrat = new Contrat();
        $form_contrat = $this->createForm(new AddContratType(), $entity_contrat);        
        
        $entity_tirage = new Tirage();
        $form_tirage = $this->createForm(new AddTirageType(), $entity_tirage);
        
        $entity_commission = new Commission();
        $form_commission = $this->createForm(new AddCommissionType(), $entity_commission);        
        
        if( $request->isMethod("POST")){
            
            $form_contrat->bind($request);
            $form_tirage->bind($request);
            $form_commission->bind($request);
            
            if ($form_contrat->isValid() && $form_tirage->isValid() && $form_commission->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                return $this->render('EmpruntBundle:Contrat:ajouterContrat.html.twig', array(
                            'entity' => new Contrat(),
                            'current' => $this->current,
                            'section' => $this->section,
                            'choice' => $this->choice,                
                            'class_alert' => 'msgsuccess',
                            'notify' => 'La convention de crédit a été ajoutée avec succès',
                            'form' => $this->createForm(new AddContratType(), $entity)->createView(),
                ));
            }else{
                    $this->class_alert = 'msgerror';
                    $this->notify = "Veuillez vérifier les champs :/"; 
            }  
        }   
       
        return $this->render('EmpruntBundle:Contrat:ajouterContrat.html.twig', array(
            'entity_contrat' => $entity_contrat,
            'form_contrat' => $form_contrat->createView(),
            'entity_tirage' => $entity_tirage,
            'form_tirage' => $form_tirage->createView(),
            'entity_commission' => $entity_commission,
            'form_commission' => $form_commission->createView(),            
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice,
            'class_alert' => $this->class_alert,
            'notify' => $this->notify,
        ));
        
    }    

    /**
     * Displays a form to create a new Contrat entity.
     *
     */
    public function newAction()
    {
        $entity = new Contrat();
        $form   = $this->createForm(new ContratType(), $entity);

        return $this->render('EmpruntBundle:Contrat:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contrat entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Contrat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Contrat:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Contrat entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Contrat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }

        $editForm = $this->createForm(new ContratType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Contrat:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Contrat entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Contrat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContratType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contrat_edit', array('id' => $id)));
        }

        return $this->render('EmpruntBundle:Contrat:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contrat entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpruntBundle:Contrat')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contrat entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contrat'));
    }

    /**
     * Creates a form to delete a Contrat entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
