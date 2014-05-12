<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddConcessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datecreation','text' , array('attr' => array('class' => array('class' => 'width100 hasDatepicker'))))
            ->add('description','text')
            ->add('nomconcession','text', array('attr' => array('class' => 'longinput')))
            ->add('valeurrealisation','number', array('attr' => array('class' => 'longinput')))
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
