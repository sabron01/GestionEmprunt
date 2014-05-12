<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 */
class Contrat
{
    /**
     * @var \DateTime
     */
    private $datesignature;

    /**
     * @var integer
     */
    private $dureeremboursement;

    /**
     * @var string
     */
    private $intervalleremboursement;

    /**
     * @var string
     */
    private $marge;

    /**
     * @var string
     */
    private $monnaiepayement;

    /**
     * @var integer
     */
    private $montantemprunt;

    /**
     * @var integer
     */
    private $nbrtirage;

    /**
     * @var integer
     */
    private $refcontrat;

    /**
     * @var string
     */
    private $tauxdirecteur;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ETAP\EmpruntBundle\Entity\Banque
     */
    private $idbanque;

    /**
     * @var \ETAP\EmpruntBundle\Entity\Besoin
     */
    private $idbesoin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idcommission;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcommission = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set datesignature
     *
     * @param \DateTime $datesignature
     * @return Contrat
     */
    public function setDatesignature($datesignature)
    {
        $this->datesignature = $datesignature;

        return $this;
    }

    /**
     * Get datesignature
     *
     * @return \DateTime 
     */
    public function getDatesignature()
    {
        return $this->datesignature;
    }

    /**
     * Set dureeremboursement
     *
     * @param integer $dureeremboursement
     * @return Contrat
     */
    public function setDureeremboursement($dureeremboursement)
    {
        $this->dureeremboursement = $dureeremboursement;

        return $this;
    }

    /**
     * Get dureeremboursement
     *
     * @return integer 
     */
    public function getDureeremboursement()
    {
        return $this->dureeremboursement;
    }

    /**
     * Set intervalleremboursement
     *
     * @param string $intervalleremboursement
     * @return Contrat
     */
    public function setIntervalleremboursement($intervalleremboursement)
    {
        $this->intervalleremboursement = $intervalleremboursement;

        return $this;
    }

    /**
     * Get intervalleremboursement
     *
     * @return string 
     */
    public function getIntervalleremboursement()
    {
        return $this->intervalleremboursement;
    }

    /**
     * Set marge
     *
     * @param string $marge
     * @return Contrat
     */
    public function setMarge($marge)
    {
        $this->marge = $marge;

        return $this;
    }

    /**
     * Get marge
     *
     * @return string 
     */
    public function getMarge()
    {
        return $this->marge;
    }

    /**
     * Set monnaiepayement
     *
     * @param string $monnaiepayement
     * @return Contrat
     */
    public function setMonnaiepayement($monnaiepayement)
    {
        $this->monnaiepayement = $monnaiepayement;

        return $this;
    }

    /**
     * Get monnaiepayement
     *
     * @return string 
     */
    public function getMonnaiepayement()
    {
        return $this->monnaiepayement;
    }

    /**
     * Set montantemprunt
     *
     * @param integer $montantemprunt
     * @return Contrat
     */
    public function setMontantemprunt($montantemprunt)
    {
        $this->montantemprunt = $montantemprunt;

        return $this;
    }

    /**
     * Get montantemprunt
     *
     * @return integer 
     */
    public function getMontantemprunt()
    {
        return $this->montantemprunt;
    }

    /**
     * Set nbrtirage
     *
     * @param integer $nbrtirage
     * @return Contrat
     */
    public function setNbrtirage($nbrtirage)
    {
        $this->nbrtirage = $nbrtirage;

        return $this;
    }

    /**
     * Get nbrtirage
     *
     * @return integer 
     */
    public function getNbrtirage()
    {
        return $this->nbrtirage;
    }

    /**
     * Set refcontrat
     *
     * @param integer $refcontrat
     * @return Contrat
     */
    public function setRefcontrat($refcontrat)
    {
        $this->refcontrat = $refcontrat;

        return $this;
    }

    /**
     * Get refcontrat
     *
     * @return integer 
     */
    public function getRefcontrat()
    {
        return $this->refcontrat;
    }

    /**
     * Set tauxdirecteur
     *
     * @param string $tauxdirecteur
     * @return Contrat
     */
    public function setTauxdirecteur($tauxdirecteur)
    {
        $this->tauxdirecteur = $tauxdirecteur;

        return $this;
    }

    /**
     * Get tauxdirecteur
     *
     * @return string 
     */
    public function getTauxdirecteur()
    {
        return $this->tauxdirecteur;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idbanque
     *
     * @param \ETAP\EmpruntBundle\Entity\Banque $idbanque
     * @return Contrat
     */
    public function setIdbanque(\ETAP\EmpruntBundle\Entity\Banque $idbanque = null)
    {
        $this->idbanque = $idbanque;

        return $this;
    }

    /**
     * Get idbanque
     *
     * @return \ETAP\EmpruntBundle\Entity\Banque 
     */
    public function getIdbanque()
    {
        return $this->idbanque;
    }

    /**
     * Set idbesoin
     *
     * @param \ETAP\EmpruntBundle\Entity\Besoin $idbesoin
     * @return Contrat
     */
    public function setIdbesoin(\ETAP\EmpruntBundle\Entity\Besoin $idbesoin = null)
    {
        $this->idbesoin = $idbesoin;

        return $this;
    }

    /**
     * Get idbesoin
     *
     * @return \ETAP\EmpruntBundle\Entity\Besoin 
     */
    public function getIdbesoin()
    {
        return $this->idbesoin;
    }

    /**
     * Add idcommission
     *
     * @param \ETAP\EmpruntBundle\Entity\Commission $idcommission
     * @return Contrat
     */
    public function addIdcommission(\ETAP\EmpruntBundle\Entity\Commission $idcommission)
    {
        $this->idcommission[] = $idcommission;

        return $this;
    }

    /**
     * Remove idcommission
     *
     * @param \ETAP\EmpruntBundle\Entity\Commission $idcommission
     */
    public function removeIdcommission(\ETAP\EmpruntBundle\Entity\Commission $idcommission)
    {
        $this->idcommission->removeElement($idcommission);
    }

    /**
     * Get idcommission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcommission()
    {
        return $this->idcommission;
    }
}
