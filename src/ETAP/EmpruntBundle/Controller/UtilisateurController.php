<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ETAP\EmpruntBundle\Entity\Utilisateur;
use ETAP\EmpruntBundle\Form\AddUtilisateurType;
use ETAP\EmpruntBundle\Form\UtilisateurType;

/**
 * Utilisateur controller.
 *
 */
class UtilisateurController extends Controller {

    function __construct() {
        $this->current = 7;
        $this->section = 7;
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify = '';
    }

    /**
     * Lists all Utilisateur entities.
     *
     */
    public function consulterUtilisateurAction() {
        $this->choice = 772;
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Utilisateur')->findAll();
        return $this->render('EmpruntBundle:Utilisateur:consulterUtilisateur.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,    
        ));
    }

    /**
     * Displays a form to create a new Utilisateur entity.
     *
     */
    public function ajouterUtilisateurAction(Request $request) {
        $this->choice = 771;
        $entity = new Utilisateur();
        $form = $this->createForm(new AddUtilisateurType(), $entity);

        if ($request->isMethod("POST")) {
            $form->bind($request); // Lier les données de la requête au formulaire .     
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                return $this->render('EmpruntBundle:Utilisateur:ajouterUtilisateur.html.twig', array(
                            'entity' => new Utilisateur(),
                            'current' => $this->current,
                            'section' => $this->section,
                            'choice' => $this->choice,
                            'class_alert' => 'msgsuccess',
                            'notify' => 'La utilisateur a été ajoutée avec succès',
                            'form' => $this->createForm(new AddUtilisateurType(), $entity)->createView(),
                ));
            } else {
                $this->class_alert = 'msgerror';
                $this->notify = "Veuillez vérifier les champs :/";
            }
        }

        return $this->render('EmpruntBundle:Utilisateur:ajouterUtilisateur.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));
    }

    public function displayUtilisateurFormAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $form = $this->createForm(new UtilisateurType(), $entity);

        return $this->render('EmpruntBundle:Utilisateur:displayUtilisateurForm.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    public function modifierUtilisateurAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EmpruntBundle:Utilisateur')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }
        $editForm = $this->createForm(new UtilisateurType(), $entity);
        $editForm->bind($request);
        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->class_alert = 'msgsuccess';
            $this->notify = "L'Utilisateur a été modifié avec succès";
        } else {
            $this->class_alert = 'msgerror';
            $this->notify = "Veuillez vérifier les champs :/";
//            return $this->redirect($this->generateUrl('ConsulterUtilisateur'));
        }      
        $entities = $em->getRepository('EmpruntBundle:Utilisateur')->findAll();
        return $this->render('EmpruntBundle:Utilisateur:consulterUtilisateur.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify
        ));
    }

    public function supprimerUtilisateurAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EmpruntBundle:Utilisateur')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }
        $em->remove($entity);
        $em->flush();
        $this->class_alert = 'msgsuccess';
        $this->notify = "L'Utilisateur a été supprimé avec succès";        
        $entities = $em->getRepository('EmpruntBundle:Utilisateur')->findAll();        
        return $this->render('EmpruntBundle:Utilisateur:consulterUtilisateur.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify
        ));
    }

}
