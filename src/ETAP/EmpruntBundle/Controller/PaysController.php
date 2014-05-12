<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Pays;
use ETAP\EmpruntBundle\Form\PaysType;

/**
 * Pays controller.
 *
 */
class PaysController extends Controller
{
    /**
     * Lists all Pays entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Pays')->findAll();

        return $this->render('EmpruntBundle:Pays:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Pays entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Pays();
        $form = $this->createForm(new PaysType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pays_show', array('id' => $entity->getId())));
        }

        return $this->render('EmpruntBundle:Pays:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Pays entity.
     *
     */
    public function newAction()
    {
        $entity = new Pays();
        $form   = $this->createForm(new PaysType(), $entity);

        return $this->render('EmpruntBundle:Pays:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pays entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Pays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pays entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Pays:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Pays entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Pays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pays entity.');
        }

        $editForm = $this->createForm(new PaysType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Pays:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Pays entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Pays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pays entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PaysType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pays_edit', array('id' => $id)));
        }

        return $this->render('EmpruntBundle:Pays:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pays entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpruntBundle:Pays')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pays entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pays'));
    }

    /**
     * Creates a form to delete a Pays entity by id.
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
