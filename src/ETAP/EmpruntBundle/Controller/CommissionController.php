<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Commission;
use ETAP\EmpruntBundle\Form\CommissionType;

/**
 * Commission controller.
 *
 */
class CommissionController extends Controller
{
    /**
     * Lists all Commission entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Commission')->findAll();

        return $this->render('EmpruntBundle:Commission:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Commission entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Commission();
        $form = $this->createForm(new CommissionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('commission_show', array('id' => $entity->getId())));
        }

        return $this->render('EmpruntBundle:Commission:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Commission entity.
     *
     */
    public function newAction()
    {
        $entity = new Commission();
        $form   = $this->createForm(new CommissionType(), $entity);

        return $this->render('EmpruntBundle:Commission:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Commission entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Commission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commission entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Commission:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Commission entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Commission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commission entity.');
        }

        $editForm = $this->createForm(new CommissionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Commission:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Commission entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Commission')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commission entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CommissionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('commission_edit', array('id' => $id)));
        }

        return $this->render('EmpruntBundle:Commission:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Commission entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpruntBundle:Commission')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Commission entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('commission'));
    }

    /**
     * Creates a form to delete a Commission entity by id.
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
