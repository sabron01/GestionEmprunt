<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concession
 */
class Concession
{
    /**
     * @var \DateTime
     */
    private $datecreation;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $nomconcession;

    /**
     * @var integer
     */
    private $valeurrealisation;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idremboursement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idremboursement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Concession
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime 
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Concession
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set nomconcession
     *
     * @param string $nomconcession
     * @return Concession
     */
    public function setNomconcession($nomconcession)
    {
        $this->nomconcession = $nomconcession;

        return $this;
    }

    /**
     * Get nomconcession
     *
     * @return string 
     */
    public function getNomconcession()
    {
        return $this->nomconcession;
    }

    /**
     * Set valeurrealisation
     *
     * @param integer $valeurrealisation
     * @return Concession
     */
    public function setValeurrealisation($valeurrealisation)
    {
        $this->valeurrealisation = $valeurrealisation;

        return $this;
    }

    /**
     * Get valeurrealisation
     *
     * @return integer 
     */
    public function getValeurrealisation()
    {
        return $this->valeurrealisation;
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
     * Add idremboursement
     *
     * @param \ETAP\EmpruntBundle\Entity\Remboursement $idremboursement
     * @return Concession
     */
    public function addIdremboursement(\ETAP\EmpruntBundle\Entity\Remboursement $idremboursement)
    {
        $this->idremboursement[] = $idremboursement;

        return $this;
    }

    /**
     * Set idremboursement
     *
     * @param \ETAP\EmpruntBundle\Entity\Remboursement $idremboursement
     * @return Concession 
     */
    public function setIdremboursement(\ETAP\EmpruntBundle\Entity\Remboursement $idremboursement)
    {
        return $this->addIdremboursement($idremboursement);
    }
    
    /**
     * Remove idremboursement
     *
     * @param \ETAP\EmpruntBundle\Entity\Remboursement $idremboursement
     */
    public function removeIdremboursement(\ETAP\EmpruntBundle\Entity\Remboursement $idremboursement)
    {
        $this->idremboursement->removeElement($idremboursement);
    }

    /**
     * Get idremboursement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdremboursement()
    {
        return $this->idremboursement;
    }
}
