<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ETAP\EmpruntBundle\Entity\Contrat;
use ETAP\EmpruntBundle\Form\AddContratType;
use ETAP\EmpruntBundle\Entity\Tirage;
use ETAP\EmpruntBundle\Form\TirageType;
use ETAP\EmpruntBundle\Form\AddTirageType;
use ETAP\EmpruntBundle\Form\AddCommissionType;
use ETAP\EmpruntBundle\Entity\Commission;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Contrat controller.
 *
 */

/**
 * 
 * @Template
 */
class ContratController extends Controller {

    function __construct() {
        $this->current = 3;
        $this->section = 3;
        $this->choice = 0;
        $this->class_alert = '';
        $this->notify = '';
    }

    /**
     * Lists all Contrat entities.
     *
     */
    public function consulterConventionAction() {
        $this->choice = 332;
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('EmpruntBundle:Contrat')->findAll();
        return $this->render('EmpruntBundle:Contrat:consulterConvention.html.twig', array(
                    'entities' => $entities,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }
    
    public function consulterContratAction(Request $request,$id){
        $this->choice = 332;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);
        if (!$entity_contrat) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }
        $form_contrat = $this->createForm(new AddContratType(), $entity_contrat);   
        return $this->render('EmpruntBundle:Contrat:consulterContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'form_contrat' => $form_contrat->createView(),
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));        
    }

    public function consulterTiragesContratAction(Request $request,$id){
        $this->choice = 332;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);      
        $query = $em->createQuery('SELECT t.id, t.datevaleur, t.montant, t.reftirage FROM EmpruntBundle:Tirage t WHERE t.idcontrat = :contrat');
        $query->setParameter('contrat', $id);
        $entities_tirages = $query->getResult();
        //$entities_tirages   = $em->getRepository('EmpruntBundle:Tirage')->findByIdcontrat($id);        
        $forms_tirages = $this->prepareTiragesForms($entities_tirages);              
        return $this->render('EmpruntBundle:Contrat:consulterTiragesContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'entities_tirages' => $entities_tirages,
                    'forms_tirages' => $forms_tirages,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));        
    }  
    
    public function consulterCommissionsContratAction(Request $request,$id){
        $this->choice = 332;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);      
        $entities_commissions = $em->getRepository('EmpruntBundle:Commission')->findAll(array(), 3, 3, 3, 3);       
        return $this->render('EmpruntBundle:Contrat:consulterCommissionsContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'entities_commissions' => $entities_commissions,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));        
    }    
    /**
     * Creates a new Contrat entity.
     *
     */
    public function ajouterContratAction(Request $request) {
        $this->choice = 331;
        $entity_contrat = new Contrat();
        $form_contrat = $this->createForm(new AddContratType(), $entity_contrat);

        if ($request->isMethod("POST")) {
            $form_contrat->bind($request);
            if ($form_contrat->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity_contrat);
                $em->flush();
                $entity_tirage = new Tirage();
                $entity_tirage->setIdcontrat($entity_contrat);
                $form_tirage = $this->createForm(new TirageType(), $entity_tirage);                
                return $this->render('EmpruntBundle:Contrat:ajouterTiragesContrat.html.twig', array(
                            'entity_contrat' => $entity_contrat,
                            'entity_tirage' => $entity_tirage,
                            'form_tirage' => $form_tirage->createView(),
                            'choice' => $this->choice,
                            'current' => $this->current,
                            'section' => $this->section,
                            'class_alert' => 'msgsuccess',
                            'notify' => 'Le contrat a été ajouté avec succès',
                ));
//                return $this->redirect($this->generateUrl('AjouterTiragesContrat', array('id' => $entity_contrat->getId())));
            } else {
                $this->class_alert = 'msgerror';
                $this->notify = "Veuillez vérifier les champs :/";
            }
        }

        return $this->render('EmpruntBundle:Contrat:ajouterContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'form_contrat' => $form_contrat->createView(),
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));
    }

    public function ajouterTiragesContratAction(Request $request, $id) {
        $this->choice = 331;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);
        $entity_tirage = new Tirage();
        $entity_tirage->setIdcontrat($entity_contrat);
        $form_tirage = $this->createForm(new TirageType(), $entity_tirage);

        if ($request->isMethod("POST")) {
            $form_tirage->bind($request);
            if ($form_tirage->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity_tirage);
                $em->flush();
                return $this->redirect($this->generateUrl('AjouterCommissionsContrat', array('id' => $entity_contrat->getId())));
            } else {
                $this->class_alert = 'msgerror';
                $this->notify = "Veuillez vérifier les champs :/";
            }
        }
        return $this->render('EmpruntBundle:Contrat:ajouterTiragesContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'entity_tirage' => $entity_tirage,
                    'form_tirage' => $form_tirage->createView(),
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));
    }

    public function SaveAndAjouterTiragesContratAction(Request $request, $id) {
        $this->choice = 331;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);
        $entity_tirage = new Tirage();
        $entity_tirage->setIdcontrat($entity_contrat);
        $form_tirage = $this->createForm(new TirageType(), $entity_tirage);
        $form_tirage->bind($request);
        if ($form_tirage->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity_tirage);
            $em->flush();
                $this->class_alert = 'msgsuccess';
                $this->notify = "Le tirage a été ajouté avec succès";           
        }              
        return $this->render('EmpruntBundle:Contrat:ajouterTiragesContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'entity_tirage' => new Tirage(),
                    'form_tirage' => $this->createForm(new TirageType(), new Tirage())->createView(),
                    'choice' => $this->choice,
                    'current' => $this->current,
                    'section' => $this->section,                    
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));        
//        return $this->redirect($this->generateUrl('AjouterTiragesContrat', array('id' => $entity_contrat->getId())));
    }

    public function ajouterCommissionsContratAction(Request $request, $id) {
        $this->choice = 331;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);
        if ($request->isMethod("POST")) {
            $commissions = $request->get("etap_empruntbundle_commissiontype");
            foreach ($commissions as $item) {
                if (isset($item['type'])) {
                    $Commission = new Commission();
                    $Commission->setTypecommission($item['type']);
                    $Commission->setValeurcommission($item['valeur']);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($Commission);
                    $em->flush();
                }
            }
            return $this->render('EmpruntBundle:Contrat:ajouterContrat.html.twig', array(
                        'entity_contrat' => new Contrat(),
                        'current' => $this->current,
                        'section' => $this->section,
                        'choice' => $this->choice,
                        'class_alert' => 'msgsuccess',
                        'notify' => 'La convention de crédit a été ajoutée avec succès',
                        'form_contrat' => $this->createForm(new AddContratType(), new Contrat())->createView(),
            ));
        }
        return $this->render('EmpruntBundle:Contrat:ajouterContratCommissions.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => '',
                    'notify' => '',
                        //'form_contrat' => $this->createForm(new AddContratType(), new Contrat())->createView(),
        ));
    }
    /**
     * Updates Contrats.
     *
     */
    public function modifierContratAction(Request $request, $id) {
        $this->choice = 332;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);
        if (!$entity_contrat) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }              
        $form_contrat = $this->createForm(new AddContratType(), $entity_contrat);         
        if( $request->isMethod("POST")){
            $form_contrat->bind($request);
            if ($form_contrat->isValid()) {
                $em->persist($entity_contrat);
                $em->flush();
                $this->class_alert = 'msgsuccess';
                $this->notify = "Le contrat a été modifié avec succès";                          
            }else{
                $this->class_alert = 'msgerror';
                $this->notify = "Veuillez vérifier les champs :/"; 
            }             
        }
        return $this->render('EmpruntBundle:Contrat:consulterContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'form_contrat' => $form_contrat->createView(),
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice, 
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify
        )); 
    }
    
    public function SaveAndConsulterTiragesContratAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);
        if (!$entity_contrat) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }              
        $form_contrat = $this->createForm(new AddContratType(), $entity_contrat);         
        if( $request->isMethod("POST")){
            $form_contrat->bind($request);
            if ($form_contrat->isValid()) {
                $em->persist($entity_contrat);
                $em->flush();
                $this->class_alert = 'msgsuccess';
                $this->notify = "Le contrat a été modifié avec succès";                          
            }else{
                $this->class_alert = 'msgerror';
                $this->notify = "Veuillez vérifier les champs :/"; 
            }             
        }     
        $query = $em->createQuery('SELECT t.id, t.datevaleur, t.montant, t.reftirage FROM EmpruntBundle:Tirage t WHERE t.idcontrat = :contrat');
        $query->setParameter('contrat', $id);
        $entities_tirages = $query->getResult();
        //$entities_tirages   = $em->getRepository('EmpruntBundle:Tirage')->findByIdcontrat($id);        
        $forms_tirages = $this->prepareTiragesForms($entities_tirages);           
        return $this->render('EmpruntBundle:Contrat:consulterTiragesContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'entities_tirages' => $entities_tirages,
                    'forms_tirages' => $forms_tirages,
                    'choice' => $this->choice,
                    'current' => $this->current,
                    'section' => $this->section,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify
        ));          
    }
    
    public function ajouterTiragesEditContratAction(Request $request, $id) {
        $this->choice = 331;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);
        $entity_tirage = new Tirage();
        $entity_tirage->setIdcontrat($entity_contrat);
        $form_tirage = $this->createForm(new TirageType(), $entity_tirage);
        if ($request->isMethod("POST")) {
            $form_tirage->bind($request);
            if ($form_tirage->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity_tirage);
                $em->flush();
                return $this->redirect($this->generateUrl('ConsulterTiragesContrat', array('id' => $entity_contrat->getId())));
            } else {
                $this->class_alert = 'msgerror';
                $this->notify = "Veuillez vérifier les champs :/";
            }
        }
        return $this->render('EmpruntBundle:Contrat:ajouterTiragesEditContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'entity_tirage' => $entity_tirage,
                    'form_tirage' => $form_tirage->createView(),
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice,
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));
    }
    
    public function SaveAndAjouterTiragesEditContratAction(Request $request, $id) {
        $this->choice = 331;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);
        $entity_tirage = new Tirage();
        $form_tirage = $this->createForm(new TirageType(), $entity_tirage);
        $form_tirage->bind($request);
        if ($form_tirage->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity_tirage);
            $em->flush();
                $this->class_alert = 'msgsuccess';
                $this->notify = "Le tirage a été ajouté avec succès";           
        }              
        return $this->render('EmpruntBundle:Contrat:ajouterTiragesEditContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'entity_tirage' => $entity_tirage,
                    'form_tirage' => $form_tirage->createView(),
                    'choice' => $this->choice,
                    'current' => $this->current,
                    'section' => $this->section,                    
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify,
        ));        
//        return $this->redirect($this->generateUrl('AjouterTiragesContrat', array('id' => $entity_contrat->getId())));
    }
    
    public function modifierTirageAction(Request $request, $id,$contrat_id) {
        $this->choice = 332;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($contrat_id);
        if (!$entity_contrat) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }              
        $form_contrat = $this->createForm(new AddContratType(), $entity_contrat); 
        $entity_tirage = $em->getRepository('EmpruntBundle:Tirage')->findOneByReftirage($id);
        if (!$entity_tirage) {
            throw $this->createNotFoundException('Unable to find Tirage entity.');
        }              
        $form_tirage = $this->createForm(new TirageType(), $entity_tirage);        
        if( $request->isMethod("POST")){
            $form_tirage->bind($request);
            if ($form_tirage->isValid()) {
                $em->persist($entity_tirage);
                $em->flush();
                $this->class_alert = 'msgsuccess';
                $this->notify = "Le Tirage a été modifié avec succès";   
                return $this->redirect($this->generateUrl('ConsulterTiragesContrat', array('id' => $entity_contrat->getId())));
            }else{
                $this->class_alert = 'msgerror';
                $this->notify = "Veuillez vérifier les champs :/"; 
            }             
        }        
        return $this->render('EmpruntBundle:Contrat:modifierTirage.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'form_contrat' => $form_contrat->createView(),
                    'entity_tirage' => $entity_tirage,
                    'form_tirage' => $form_tirage->createView(),            
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice, 
                    'class_alert' => $this->class_alert,
                    'notify' => $this->notify
        )); 
    }    
    
    public function modifierCommissionsContratAction(Request $request, $id) {
        $this->choice = 331;
        $em = $this->getDoctrine()->getManager();
        $entity_contrat = $em->getRepository('EmpruntBundle:Contrat')->find($id);

        $form_contrat = $this->createForm(new AddContratType(), $entity_contrat);   
        return $this->render('EmpruntBundle:Contrat:consulterContrat.html.twig', array(
                    'entity_contrat' => $entity_contrat,
                    'form_contrat' => $form_contrat->createView(),
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
    public function newAction() {
        $entity = new Contrat();
        $form = $this->createForm(new ContratType(), $entity);

        return $this->render('EmpruntBundle:Contrat:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contrat entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Contrat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Contrat:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Contrat entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EmpruntBundle:Contrat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contrat entity.');
        }

        $editForm = $this->createForm(new ContratType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EmpruntBundle:Contrat:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }
    
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }    

    /**
     * Edits an existing Contrat entity.
     *
     */
    public function updateAction(Request $request, $id) {
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
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contrat entity.
     *
     */
    public function deleteAction(Request $request, $id) {
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
    private function prepareTiragesForms($entities_tirages) {
        $i = 0;
        $forms_tirages = array();
        foreach ($entities_tirages as $entity_tirage){
            $tirage = new Tirage();
//            $tirage->setId($entity_tirage['id']);
            $tirage->setDatevaleur($entity_tirage['datevaleur']);
            $tirage->setMontant($entity_tirage['montant']);
            $tirage->setReftirage($entity_tirage['reftirage']);                        
            $form_tirage = $this->createForm(new AddTirageType($i), $tirage)->createView();
            $forms_tirages[]=$form_tirage;  
            $i++;
        }        
        return $forms_tirages;
    }   
}
