<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Jourferie;
use ETAP\EmpruntBundle\Form\JourferieType;

/**
 * Jourferie controller.
 *
 */
class JourferieController extends Controller
{
    function __construct() {
        $this->current = 5;
        $this->section = 5;  
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify  = '';     
    } 
    
    public function consulterJoursFeriesAction()
    {
        $this->choice = 551;
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Jourferie')->findAll();

        return $this->render('EmpruntBundle:Jourferie:consulterJoursFeries.html.twig', array(
            'entities' => $entities,
            'current' => $this->current,
            'section' => $this->section,
            'choice' => $this->choice            
        ));
    }    
    
    /**
     * Lists all Jourferie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Jourferie')->findAll();

        return $this->render('EmpruntBundle:Jourferie:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Jourferie entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Jourferie();
        $form = $this->createForm(new JourferieType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('jourferie_show', array('id' => $entity->getId())));
        }

        return $this->render('EmpruntBundle:Jourferie:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Jourferie entity.
     *
     */
    public function newAction()
    {
        $entity = new Jourferie();
        $form   = $this->createForm(new JourferieType(), $entity);

        return $this->render('EmpruntBundle:Jourferie:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Jourferie entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Jourferie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jourferie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Jourferie:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Jourferie entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Jourferie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jourferie entity.');
        }

        $editForm = $this->createForm(new JourferieType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Jourferie:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Jourferie entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Jourferie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jourferie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new JourferieType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('jourferie_edit', array('id' => $id)));
        }

        return $this->render('EmpruntBundle:Jourferie:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Jourferie entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpruntBundle:Jourferie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Jourferie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('jourferie'));
    }

    /**
     * Creates a form to delete a Jourferie entity by id.
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
