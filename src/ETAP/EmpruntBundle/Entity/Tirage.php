<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tirage
 */
class Tirage
{
    /**
     * @var \DateTime
     */
    private $datevaleur;

    /**
     * @var string
     */
    private $montant;

    /**
     * @var integer
     */
    private $reftirage;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ETAP\EmpruntBundle\Entity\Contrat
     */
    private $idcontrat;


    /**
     * Set datevaleur
     *
     * @param \DateTime $datevaleur
     * @return Tirage
     */
    public function setDatevaleur($datevaleur)
    {
        $this->datevaleur = $datevaleur;

        return $this;
    }

    /**
     * Get datevaleur
     *
     * @return \DateTime 
     */
    public function getDatevaleur()
    {
        return $this->datevaleur;
    }

    /**
     * Set montant
     *
     * @param string $montant
     * @return Tirage
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set reftirage
     *
     * @param integer $reftirage
     * @return Tirage
     */
    public function setReftirage($reftirage)
    {
        $this->reftirage = $reftirage;

        return $this;
    }

    /**
     * Get reftirage
     *
     * @return integer 
     */
    public function getReftirage()
    {
        return $this->reftirage;
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
     * Set idcontrat
     *
     * @param \ETAP\EmpruntBundle\Entity\Contrat $idcontrat
     * @return Tirage
     */
    public function setIdcontrat(\ETAP\EmpruntBundle\Entity\Contrat $idcontrat = null)
    {
        $this->idcontrat = $idcontrat;

        return $this;
    }

    /**
     * Get idcontrat
     *
     * @return \ETAP\EmpruntBundle\Entity\Contrat 
     */
    public function getIdcontrat()
    {
        return $this->idcontrat;
    }
}
