<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ETAP\EmpruntBundle\Entity\Banque;
use ETAP\EmpruntBundle\Form\AddBanqueType;

/**
 * Banque controller.
 *
 */
class BanqueController extends Controller
{
    
    public function ajouterBanqueAction(Request $request) {
        $entity = new Banque();
        $form = $this->createForm(new AddBanqueType(), $entity);
        
        if( $request->isMethod("POST")){
            $form->bind($request);// Lier les données de la requête au formulaire .     
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                return  new \Symfony\Component\HttpFoundation\Response($content="1");
//                return $this->render('EmpruntBundle:Banque:ajouterBanque.html.twig', array(
//                            'entity' => new Demande(),             
//                            'form' => $this->createForm(new AddBanqueType(), $entity)->createView(),
//                ));
            }
        }   
       
        return $this->render('EmpruntBundle:Banque:ajouterBanque.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
        
    }
}
