<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
         //   ->add('datedemande','date', array('attr' => array('class' => 'width100 longinput')))        
         
            ->add('datedemande','text') 
            ->add('dureecredit','text', array('attr' => array('class' => 'longinput')))
            ->add('monnaiecredit','text', array('attr' => array('class' => 'longinput')))
            ->add('montantcredit','number', array('attr' => array('class' => 'longinput')))
            ->add('natureoperation','text', array('attr' => array('class' => 'longinput')))
            ->add('refdemande','text', array('attr' => array('class' => 'longinput')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Demande'
        ));
    }

    public function getName()
    {
        return 'etap_empruntbundle_demandetype';
    }
}
