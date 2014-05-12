<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jourferie
 */
class Jourferie
{
    /**
     * @var \DateTime
     */
    private $datejf;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idremboursement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idpays;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idremboursement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idpays = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set datejf
     *
     * @param \DateTime $datejf
     * @return Jourferie
     */
    public function setDatejf($datejf)
    {
        $this->datejf = $datejf;

        return $this;
    }

    /**
     * Get datejf
     *
     * @return \DateTime 
     */
    public function getDatejf()
    {
        return $this->datejf;
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
     * @return Jourferie
     */
    public function addIdremboursement(\ETAP\EmpruntBundle\Entity\Remboursement $idremboursement)
    {
        $this->idremboursement[] = $idremboursement;

        return $this;
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

    /**
     * Add idpays
     *
     * @param \ETAP\EmpruntBundle\Entity\Pays $idpays
     * @return Jourferie
     */
    public function addIdpay(\ETAP\EmpruntBundle\Entity\Pays $idpays)
    {
        $this->idpays[] = $idpays;

        return $this;
    }

    /**
     * Remove idpays
     *
     * @param \ETAP\EmpruntBundle\Entity\Pays $idpays
     */
    public function removeIdpay(\ETAP\EmpruntBundle\Entity\Pays $idpays)
    {
        $this->idpays->removeElement($idpays);
    }

    /**
     * Get idpays
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdpays()
    {
        return $this->idpays;
    }
}
