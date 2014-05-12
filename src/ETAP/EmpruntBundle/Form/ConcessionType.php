<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConcessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datecreation','text') 
            ->add('description','text', array('attr' => array('class' => 'longinput')))
            ->add('nomconcession','text', array('attr' => array('class' => 'longinput')))
            ->add('valeurrealisation','number', array('attr' => array('class' => 'longinput')))
            ->add('idremboursement','text', array('attr' => array('class' => 'longinput')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Concession'
        ));
    }

    public function getName()
    {
        return 'etap_empruntbundle_concessiontype';
    }
}
