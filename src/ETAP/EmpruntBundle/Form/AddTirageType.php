<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddTirageType extends AbstractType
{
    private $index;
    
    
    function __construct($index)    
    {
     $this->index = $index;   
    }    
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
//            ->add('reftirage','number', array('label'  => 'Réference Tirage','attr' => array('class' => 'longinput')))
//            ->add('montant','number', array('label'  => 'Montant','attr' => array('class' => 'longinput')))
//            ->add('datevaleur','date', array('label'  => 'Date de valeur du Tirage','format'=>'MM dd yyyy'))
//                ->add('idcontrat', 'entity', array('empty_value'=>'','class'=> 'EmpruntBundle:Contrat','property' => 'id','required' => false))                              
                ->add('idcontrat','hidden') 
                ->add('reftirage','number', array('attr' => array('class' => 'longinput')))                
                ->add('montant','number', array('attr' => array('class' => 'longinput')))
                ->add('datevaleur','date')   
            
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Tirage'
        ));
    }
    
    public function getName()
    {
        return 'etap_empruntbundle_tiragetype_'.$this->index;
    }
}
