<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 */
class Offre
{
    /**
     * @var string
     */
    private $codeoffre;

    /**
     * @var \DateTime
     */
    private $dateoffre;

    /**
     * @var string
     */
    private $marge;

    /**
     * @var string
     */
    private $monnaieremboursement;

    /**
     * @var integer
     */
    private $montantpropose;

    /**
     * @var string
     */
    private $natureoffre;

    /**
     * @var string
     */
    private $tauxdirecteur;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ETAP\EmpruntBundle\Entity\Demande
     */
    private $iddemande;

    /**
     * @var \ETAP\EmpruntBundle\Entity\Banque
     */
    private $idbanque;


    /**
     * Set codeoffre
     *
     * @param string $codeoffre
     * @return Offre
     */
    public function setCodeoffre($codeoffre)
    {
        $this->codeoffre = $codeoffre;

        return $this;
    }

    /**
     * Get codeoffre
     *
     * @return string 
     */
    public function getCodeoffre()
    {
        return $this->codeoffre;
    }

    /**
     * Set dateoffre
     *
     * @param \DateTime $dateoffre
     * @return Offre
     */
    public function setDateoffre($dateoffre)
    {
        $this->dateoffre = $dateoffre;

        return $this;
    }

    /**
     * Get dateoffre
     *
     * @return \DateTime 
     */
    public function getDateoffre()
    {
        return $this->dateoffre;
    }

    /**
     * Set marge
     *
     * @param string $marge
     * @return Offre
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
     * Set monnaieremboursement
     *
     * @param string $monnaieremboursement
     * @return Offre
     */
    public function setMonnaieremboursement($monnaieremboursement)
    {
        $this->monnaieremboursement = $monnaieremboursement;

        return $this;
    }

    /**
     * Get monnaieremboursement
     *
     * @return string 
     */
    public function getMonnaieremboursement()
    {
        return $this->monnaieremboursement;
    }

    /**
     * Set montantpropose
     *
     * @param integer $montantpropose
     * @return Offre
     */
    public function setMontantpropose($montantpropose)
    {
        $this->montantpropose = $montantpropose;

        return $this;
    }

    /**
     * Get montantpropose
     *
     * @return integer 
     */
    public function getMontantpropose()
    {
        return $this->montantpropose;
    }

    /**
     * Set natureoffre
     *
     * @param string $natureoffre
     * @return Offre
     */
    public function setNatureoffre($natureoffre)
    {
        $this->natureoffre = $natureoffre;

        return $this;
    }

    /**
     * Get natureoffre
     *
     * @return string 
     */
    public function getNatureoffre()
    {
        return $this->natureoffre;
    }

    /**
     * Set tauxdirecteur
     *
     * @param string $tauxdirecteur
     * @return Offre
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
     * Set iddemande
     *
     * @param \ETAP\EmpruntBundle\Entity\Demande $iddemande
     * @return Offre
     */
    public function setIddemande(\ETAP\EmpruntBundle\Entity\Demande $iddemande = null)
    {
        $this->iddemande = $iddemande;

        return $this;
    }

    /**
     * Get iddemande
     *
     * @return \ETAP\EmpruntBundle\Entity\Demande 
     */
    public function getIddemande()
    {
        return $this->iddemande;
    }

    /**
     * Set idbanque
     *
     * @param \ETAP\EmpruntBundle\Entity\Banque $idbanque
     * @return Offre
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
}
