<?php

namespace ETAP\EmpruntBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 */
class User extends BaseUser
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var integer
     */
    private $matricule;

    /**
     * @var string
     */
    private $motdepasse;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \ETAP\EmpruntBundle\Entity\Profil
     */
    private $idprofil;


    /**
     * Set login
     *
     * @param string $login
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set matricule
     *
     * @param integer $matricule
     * @return Utilisateur
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return integer 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set motdepasse
     *
     * @param string $motdepasse
     * @return Utilisateur
     */
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    /**
     * Get motdepasse
     *
     * @return string 
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
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
     * Set idprofil
     *
     * @param \ETAP\EmpruntBundle\Entity\Profil $idprofil
     * @return Utilisateur
     */
    public function setIdprofil(\ETAP\EmpruntBundle\Entity\Profil $idprofil = null)
    {
        $this->idprofil = $idprofil;

        return $this;
    }

    /**
     * Get idprofil
     *
     * @return \ETAP\EmpruntBundle\Entity\Profil 
     */
    public function getIdprofil()
    {
        return $this->idprofil;
    }
}
