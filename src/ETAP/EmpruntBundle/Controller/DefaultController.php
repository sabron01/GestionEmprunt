<?php

namespace ETAP\EmpruntBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('EmpruntBundle:Default:index.html.twig');
    }

    public function testAction() {
        $entity = new \ETAP\EmpruntBundle\Entity\Banque();
        $form = $this->createForm(new \ETAP\EmpruntBundle\Form\BanqueType(), $entity);
        return $this->render('EmpruntBundle:Default:test.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    public function accueilAction() {
        $current = 0;
        $section = 0;
        $this->choice = 0;
        return $this->render('EmpruntBundle:Default:accueil.html.twig', array(
            'current' => $current, 
            'section' => $section,
            'choice' => $this->choice
        ));
    }

    public function fundingOpportunitiesAction() {
        $this->current = 1;
        $this->section = 1;
        $this->choice = 0;
        return $this->render('EmpruntBundle:Default:OpportunitesFinancement.html.twig', array(
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }

    public function projetsAction() {
        $this->current = 2;
        $this->section = 2;
        $this->choice = 0;
        return $this->render('EmpruntBundle:Default:Projets.html.twig', array(
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }

    public function contratsAction() {
        $this->current = 3;
        $this->section = 3;
        $this->choice = 0;
        return $this->render('EmpruntBundle:Default:Contrats.html.twig', array(
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }
    
    public function remboursementsAction() {
        $this->current = 4;
        $this->section = 4;
        $this->choice = 0;
        return $this->render('EmpruntBundle:Default:Remboursements.html.twig', array(
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }  
    
    public function joursFeriesAction() {
        $this->current = 5;
        $this->section = 5;
        $this->choice = 0;
        return $this->render('EmpruntBundle:Default:JoursFeries.html.twig', array(
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }      

    public function etatsAction() {
        $this->current = 6;
        $this->section = 6;
        $this->choice = 0;
        return $this->render('EmpruntBundle:Default:Etats.html.twig', array(
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }     
    
    public function utilisateursAction() {
        $this->current = 7;
        $this->section = 7;
        $this->choice = 0;
        return $this->render('EmpruntBundle:Default:Utilisateurs.html.twig', array(
                    'current' => $this->current,
                    'section' => $this->section,
                    'choice' => $this->choice
        ));
    }     
    
    public function menuAction($current) {
        return $this->render('EmpruntBundle:Default:menu.html.twig', array('current' => $current));
    }

    public function verticalMenuAction($current) {
        return $this->render('EmpruntBundle:Default:vertical_menu.html.twig', array('section' => $section));
    }

}
