<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeoffre','text', array('attr' => array('class' => 'longinput')))
            ->add('dateoffre','text', array('attr' => array('class' => 'width100 hasDatepicker'))) 
            ->add('marge','text', array('attr' => array('class' => 'longinput')))
            ->add('monnaieremboursement','text', array('attr' => array('class' => 'longinput')))
            ->add('montantpropose','text', array('attr' => array('class' => 'longinput')))
            ->add('natureoffre','text', array('attr' => array('class' => 'longinput')))
            ->add('tauxdirecteur','text', array('attr' => array('class' => 'longinput')))  
          
            ->add('iddemande', 'entity', array('empty_value'=>'Sélectionner une Demande','class'=> 'EmpruntBundle:Demande','property' => 'refdemande','required' => false
            ))
            ->add('idbanque', 'entity', array('empty_value'=>'Sélectionner une Banque','class'=> 'EmpruntBundle:Banque','property' => 'nomBanque','required' => false
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Offre'
        ));
    }

    public function getName()
    {
        return 'etap_empruntbundle_offretype';
    }
}
