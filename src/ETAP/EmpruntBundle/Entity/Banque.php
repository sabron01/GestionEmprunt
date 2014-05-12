<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banque
 */
class Banque
{
    /**
     * @var integer
     */
    private $fax;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $nombanque;

    /**
     * @var string
     */
    private $nomresponsable;

    /**
     * @var integer
     */
    private $telephone;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ETAP\EmpruntBundle\Entity\Pays
     */
    private $idpays;
    
    public function __toString()
    {
     return $this->nombanque;
    }


    /**
     * Set fax
     *
     * @param integer $fax
     * @return Banque
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return integer 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Banque
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set nombanque
     *
     * @param string $nombanque
     * @return Banque
     */
    public function setNombanque($nombanque)
    {
        $this->nombanque = $nombanque;

        return $this;
    }

    /**
     * Get nombanque
     *
     * @return string 
     */
    public function getNombanque()
    {
        return $this->nombanque;
    }

    /**
     * Set nomresponsable
     *
     * @param string $nomresponsable
     * @return Banque
     */
    public function setNomresponsable($nomresponsable)
    {
        $this->nomresponsable = $nomresponsable;

        return $this;
    }

    /**
     * Get nomresponsable
     *
     * @return string 
     */
    public function getNomresponsable()
    {
        return $this->nomresponsable;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Banque
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
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
     * Set idpays
     *
     * @param \ETAP\EmpruntBundle\Entity\Pays $idpays
     * @return Banque
     */
    public function setIdpays(\ETAP\EmpruntBundle\Entity\Pays $idpays = null)
    {
        $this->idpays = $idpays;

        return $this;
    }

    /**
     * Get idpays
     *
     * @return \ETAP\EmpruntBundle\Entity\Pays 
     */
    public function getIdpays()
    {
        return $this->idpays;
    }
}
