<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Besoin
 */
class Besoin
{
    /**
     * @var \DateTime
     */
    private $datebesoin;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var integer
     */
    private $valeur;

    /**
     * @var integer
     */
    private $id;

    
    public function __toString()
    {
     return $this->libelle;
    }

    /**
     * Set datebesoin
     *
     * @param \DateTime $datebesoin
     * @return Besoin
     */
    public function setDatebesoin($datebesoin)
    {
        $this->datebesoin = $datebesoin;

        return $this;
    }

    /**
     * Get datebesoin
     *
     * @return \DateTime 
     */
    public function getDatebesoin()
    {
        return $this->datebesoin;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Besoin
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
     * Set libelle
     *
     * @param string $libelle
     * @return Besoin
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set valeur
     *
     * @param integer $valeur
     * @return Besoin
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return integer 
     */
    public function getValeur()
    {
        return $this->valeur;
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
