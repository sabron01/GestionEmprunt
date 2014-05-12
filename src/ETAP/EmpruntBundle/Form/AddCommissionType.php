<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddCommissionType extends AbstractType
{   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typecommission','number', array('attr' => array('class' => 'longinput')))
            ->add('valeurcommission','number', array('attr' => array('class' => 'smallinput width50')))
            ->add('idcontrat')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Commission'
        ));
    }

    public function getName()
    {
        return 'etap_empruntbundle_commissiontype';
    }
}
