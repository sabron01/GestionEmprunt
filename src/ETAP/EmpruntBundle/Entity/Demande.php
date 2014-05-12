<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 */
class Demande
{
    /**
     * @var \DateTime
     */
    private $datedemande;

    /**
     * @var integer
     */
    private $dureecredit;

    /**
     * @var string
     */
    private $monnaiecredit;

    /**
     * @var string
     */
    private $montantcredit;

    /**
     * @var string
     */
    private $natureoperation;

    /**
     * @var string
     */
    private $refdemande;

    /**
     * @var integer
     */
    private $id;
    
    public function __toString()
    {
     return $this->natureoperation;
    }


    /**
     * Set datedemande
     *
     * @param \DateTime $datedemande
     * @return Demande
     */
    public function setDatedemande($datedemande)
    {
        $this->datedemande = $datedemande;

        return $this;
    }

    /**
     * Get datedemande
     *
     * @return \DateTime 
     */
    public function getDatedemande()
    {
        return $this->datedemande;
    }

    /**
     * Set dureecredit
     *
     * @param integer $dureecredit
     * @return Demande
     */
    public function setDureecredit($dureecredit)
    {
        $this->dureecredit = $dureecredit;

        return $this;
    }

    /**
     * Get dureecredit
     *
     * @return integer 
     */
    public function getDureecredit()
    {
        return $this->dureecredit;
    }

    /**
     * Set monnaiecredit
     *
     * @param string $monnaiecredit
     * @return Demande
     */
    public function setMonnaiecredit($monnaiecredit)
    {
        $this->monnaiecredit = $monnaiecredit;

        return $this;
    }

    /**
     * Get monnaiecredit
     *
     * @return string 
     */
    public function getMonnaiecredit()
    {
        return $this->monnaiecredit;
    }

    /**
     * Set montantcredit
     *
     * @param string $montantcredit
     * @return Demande
     */
    public function setMontantcredit($montantcredit)
    {
        $this->montantcredit = $montantcredit;

        return $this;
    }

    /**
     * Get montantcredit
     *
     * @return string 
     */
    public function getMontantcredit()
    {
        return $this->montantcredit;
    }

    /**
     * Set natureoperation
     *
     * @param string $natureoperation
     * @return Demande
     */
    public function setNatureoperation($natureoperation)
    {
        $this->natureoperation = $natureoperation;

        return $this;
    }

    /**
     * Get natureoperation
     *
     * @return string 
     */
    public function getNatureoperation()
    {
        return $this->natureoperation;
    }

    /**
     * Set refdemande
     *
     * @param string $refdemande
     * @return Demande
     */
    public function setRefdemande($refdemande)
    {
        $this->refdemande = $refdemande;

        return $this;
    }

    /**
     * Get refdemande
     *
     * @return string 
     */
    public function getRefdemande()
    {
        return $this->refdemande;
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
}
