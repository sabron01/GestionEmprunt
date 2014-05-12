<?php

namespace ETAP\EmpruntBundle\Entity;

class Convention extends Contrat {
    
    protected $tirages;
    
    protected $commisions;
    
     public function getTirages()
    {
        return $this->tirages;
    }

    public function setTirages(ArrayCollection $tags)
    {
        $this->commisions = $tags;
    }
    
    public function getCommisions()
    {
        return $this->tirages;
    }

    public function setCommisions(ArrayCollection $tags)
    {
        $this->commisions = $tags;
    }    
    
}
