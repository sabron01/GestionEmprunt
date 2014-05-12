<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddBesoinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder               
            ->add('datebesoin','text', array('attr' => array('class' => 'width100 hasDatepicker')))         
            ->add('description','text', array('attr' => array('class' => 'longinput')))
            ->add('libelle','text', array('attr' => array('class' => 'longinput')))
            ->add('valeur','number', array('attr' => array('class' => 'longinput'))) 
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Besoin'
        ));
    }

    public function getName()
    {
        return 'etap_empruntbundle_besointype';
    }
}
