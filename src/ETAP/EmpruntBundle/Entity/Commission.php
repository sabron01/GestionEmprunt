<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commission
 */
class Commission
{
    /**
     * @var string
     */
    private $typecommission;

    /**
     * @var integer
     */
    private $valeurcommission;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idcontrat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcontrat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set typecommission
     *
     * @param string $typecommission
     * @return Commission
     */
    public function setTypecommission($typecommission)
    {
        $this->typecommission = $typecommission;

        return $this;
    }

    /**
     * Get typecommission
     *
     * @return string 
     */
    public function getTypecommission()
    {
        return $this->typecommission;
    }

    /**
     * Set valeurcommission
     *
     * @param integer $valeurcommission
     * @return Commission
     */
    public function setValeurcommission($valeurcommission)
    {
        $this->valeurcommission = $valeurcommission;

        return $this;
    }

    /**
     * Get valeurcommission
     *
     * @return integer 
     */
    public function getValeurcommission()
    {
        return $this->valeurcommission;
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
     * Add idcontrat
     *
     * @param \ETAP\EmpruntBundle\Entity\Contrat $idcontrat
     * @return Commission
     */
    public function addIdcontrat(\ETAP\EmpruntBundle\Entity\Contrat $idcontrat)
    {
        $this->idcontrat[] = $idcontrat;

        return $this;
    }

    /**
     * Remove idcontrat
     *
     * @param \ETAP\EmpruntBundle\Entity\Contrat $idcontrat
     */
    public function removeIdcontrat(\ETAP\EmpruntBundle\Entity\Contrat $idcontrat)
    {
        $this->idcontrat->removeElement($idcontrat);
    }

    /**
     * Get idcontrat
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcontrat()
    {
        return $this->idcontrat;
    }
}
