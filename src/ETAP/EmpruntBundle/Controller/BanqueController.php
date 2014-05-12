<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Banque;
use ETAP\EmpruntBundle\Form\BanqueType;

/**
 * Banque controller.
 *
 */
class BanqueController extends Controller
{
    /**
     * Lists all Banque entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EmpruntBundle:Banque')->findAll();

        return $this->render('EmpruntBundle:Banque:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Banque entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Banque();
        $form = $this->createForm(new BanqueType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('banque_show', array('id' => $entity->getId())));
        }

        return $this->render('EmpruntBundle:Banque:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Banque entity.
     *
     */
    public function newAction()
    {
        $entity = new Banque();
        $form   = $this->createForm(new BanqueType(), $entity);

        return $this->render('EmpruntBundle:Banque:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Banque entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Banque')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Banque entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Banque:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Banque entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Banque')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Banque entity.');
        }

        $editForm = $this->createForm(new BanqueType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Banque:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Banque entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Banque')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Banque entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BanqueType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('banque_edit', array('id' => $id)));
        }

        return $this->render('EmpruntBundle:Banque:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Banque entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EmpruntBundle:Banque')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Banque entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('banque'));
    }

    /**
     * Creates a form to delete a Banque entity by id.
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
