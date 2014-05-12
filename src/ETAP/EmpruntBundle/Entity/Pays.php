<?php

namespace ETAP\EmpruntBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 */
class Pays
{
    /**
     * @var string
     */
    private $codepays;

    /**
     * @var string
     */
    private $nompays;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idjf;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idjf = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set codepays
     *
     * @param string $codepays
     * @return Pays
     */
    public function setCodepays($codepays)
    {
        $this->codepays = $codepays;

        return $this;
    }

    /**
     * Get codepays
     *
     * @return string 
     */
    public function getCodepays()
    {
        return $this->codepays;
    }

    /**
     * Set nompays
     *
     * @param string $nompays
     * @return Pays
     */
    public function setNompays($nompays)
    {
        $this->nompays = $nompays;

        return $this;
    }

    /**
     * Get nompays
     *
     * @return string 
     */
    public function getNompays()
    {
        return $this->nompays;
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
     * Add idjf
     *
     * @param \ETAP\EmpruntBundle\Entity\Jourferie $idjf
     * @return Pays
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
