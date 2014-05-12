<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Remboursement
 */
class Remboursement
{
    /**
     * @var \DateTime
     */
    private $dateecheance;

    /**
     * @var string
     */
    private $interet;

    /**
     * @var string
     */
    private $montantprincipal;

    /**
     * @var string
     */
    private $montantrestantdu;

    /**
     * @var string
     */
    private $montanttotal;

    /**
     * @var string
     */
    private $montanttotalremb;

    /**
     * @var integer
     */
    private $nbrjours;

    /**
     * @var integer
     */
    private $numremboursement;

    /**
     * @var string
     */
    private $tauxdirecteur;

    /**
     * @var string
     */
    private $tauxinteret;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ETAP\EmpruntBundle\Entity\Tirage
     */
    private $idtirage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idconcession;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idjf;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idconcession = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idjf = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set dateecheance
     *
     * @param \DateTime $dateecheance
     * @return Remboursement
     */
    public function setDateecheance($dateecheance)
    {
        $this->dateecheance = $dateecheance;

        return $this;
    }

    /**
     * Get dateecheance
     *
     * @return \DateTime 
     */
    public function getDateecheance()
    {
        return $this->dateecheance;
    }

    /**
     * Set interet
     *
     * @param string $interet
     * @return Remboursement
     */
    public function setInteret($interet)
    {
        $this->interet = $interet;

        return $this;
    }

    /**
     * Get interet
     *
     * @return string 
     */
    public function getInteret()
    {
        return $this->interet;
    }

    /**
     * Set montantprincipal
     *
     * @param string $montantprincipal
     * @return Remboursement
     */
    public function setMontantprincipal($montantprincipal)
    {
        $this->montantprincipal = $montantprincipal;

        return $this;
    }

    /**
     * Get montantprincipal
     *
     * @return string 
     */
    public function getMontantprincipal()
    {
        return $this->montantprincipal;
    }

    /**
     * Set montantrestantdu
     *
     * @param string $montantrestantdu
     * @return Remboursement
     */
    public function setMontantrestantdu($montantrestantdu)
    {
        $this->montantrestantdu = $montantrestantdu;

        return $this;
    }

    /**
     * Get montantrestantdu
     *
     * @return string 
     */
    public function getMontantrestantdu()
    {
        return $this->montantrestantdu;
    }

    /**
     * Set montanttotal
     *
     * @param string $montanttotal
     * @return Remboursement
     */
    public function setMontanttotal($montanttotal)
    {
        $this->montanttotal = $montanttotal;

        return $this;
    }

    /**
     * Get montanttotal
     *
     * @return string 
     */
    public function getMontanttotal()
    {
        return $this->montanttotal;
    }

    /**
     * Set montanttotalremb
     *
     * @param string $montanttotalremb
     * @return Remboursement
     */
    public function setMontanttotalremb($montanttotalremb)
    {
        $this->montanttotalremb = $montanttotalremb;

        return $this;
    }

    /**
     * Get montanttotalremb
     *
     * @return string 
     */
    public function getMontanttotalremb()
    {
        return $this->montanttotalremb;
    }

    /**
     * Set nbrjours
     *
     * @param integer $nbrjours
     * @return Remboursement
     */
    public function setNbrjours($nbrjours)
    {
        $this->nbrjours = $nbrjours;

        return $this;
    }

    /**
     * Get nbrjours
     *
     * @return integer 
     */
    public function getNbrjours()
    {
        return $this->nbrjours;
    }

    /**
     * Set numremboursement
     *
     * @param integer $numremboursement
     * @return Remboursement
     */
    public function setNumremboursement($numremboursement)
    {
        $this->numremboursement = $numremboursement;

        return $this;
    }

    /**
     * Get numremboursement
     *
     * @return integer 
     */
    public function getNumremboursement()
    {
        return $this->numremboursement;
    }

    /**
     * Set tauxdirecteur
     *
     * @param string $tauxdirecteur
     * @return Remboursement
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
     * Set tauxinteret
     *
     * @param string $tauxinteret
     * @return Remboursement
     */
    public function setTauxinteret($tauxinteret)
    {
        $this->tauxinteret = $tauxinteret;

        return $this;
    }

    /**
     * Get tauxinteret
     *
     * @return string 
     */
    public function getTauxinteret()
    {
        return $this->tauxinteret;
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
     * Set idtirage
     *
     * @param \ETAP\EmpruntBundle\Entity\Tirage $idtirage
     * @return Remboursement
     */
    public function setIdtirage(\ETAP\EmpruntBundle\Entity\Tirage $idtirage = null)
    {
        $this->idtirage = $idtirage;

        return $this;
    }

    /**
     * Get idtirage
     *
     * @return \ETAP\EmpruntBundle\Entity\Tirage 
     */
    public function getIdtirage()
    {
        return $this->idtirage;
    }

    /**
     * Add idconcession
     *
     * @param \ETAP\EmpruntBundle\Entity\Concession $idconcession
     * @return Remboursement
     */
    public function addIdconcession(\ETAP\EmpruntBundle\Entity\Concession $idconcession)
    {
        $this->idconcession[] = $idconcession;

        return $this;
    }

    /**
     * Remove idconcession
     *
     * @param \ETAP\EmpruntBundle\Entity\Concession $idconcession
     */
    public function removeIdconcession(\ETAP\EmpruntBundle\Entity\Concession $idconcession)
    {
        $this->idconcession->removeElement($idconcession);
    }

    /**
     * Get idconcession
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdconcession()
    {
        return $this->idconcession;
    }

    /**
     * Add idjf
     *
     * @param \ETAP\EmpruntBundle\Entity\Jourferie $idjf
     * @return Remboursement
     */
    public function addIdjf(\ETAP\EmpruntBundle\Entity\Jourferie $idjf)
    {
        $this->idjf[] = $idjf;

        return $this;
    }

    /**
     * Remove idjf
     *
     * @param \ETAP\EmpruntBundle\Entity\Jourferie $idjf
     */
    public function removeIdjf(\ETAP\EmpruntBundle\Entity\Jourferie $idjf)
    {
        $this->idjf->removeElement($idjf);
    }

    /**
     * Get idjf
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdjf()
    {
        return $this->idjf;
    }
}
