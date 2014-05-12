<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Tirage;
use ETAP\EmpruntBundle\Form\TirageType;

/**
 * Tirage controller.
 *
 */
class TirageController extends Controller
{
    
    public function displayTirageFormAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = new Contrat();
        $form_contrat = $this->createForm(new ContratType(), $entity_contrat);
        return $this->render('EmpruntBundle:Tirage:displayContratForm.html.twig', array(
            'entity_tirage' => $entity_contrat,
            'form_contrat' => $form_contrat->createView(), 
            'id'=>$id,
        ));
    }
        
    /**
     * Lists all Tirage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Tirage')->findAll();

        return $this->render('EmpruntBundle:Tirage:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Tirage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tirage();
        $form = $this->createForm(new TirageType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tirage_show', array('id' => $entity->getId())));
        }

        return $this->render('EmpruntBundle:Tirage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tirage entity.
     *
     */
    public function newAction()
    {
        $entity = new Tirage();
        $form   = $this->createForm(new TirageType(), $entity);

        return $this->render('EmpruntBundle:Tirage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tirage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Tirage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tirage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Tirage:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tirage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Tirage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tirage entity.');
        }

        $editForm = $this->createForm(new TirageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Tirage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tirage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Tirage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tirage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TirageType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tirage_edit', array('id' => $id)));
        }

        return $this->render('EmpruntBundle:Tirage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tirage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpruntBundle:Tirage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tirage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tirage'));
    }

    /**
     * Creates a form to delete a Tirage entity by id.
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
