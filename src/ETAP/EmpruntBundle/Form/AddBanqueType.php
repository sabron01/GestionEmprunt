<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddBanqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fax','text', array('attr' => array('class' => 'longinput')))
            ->add('mail','text', array('attr' => array('class' => 'longinput')))
            ->add('nombanque','text', array('attr' => array('class' => 'longinput')))
            ->add('nomresponsable','text', array('attr' => array('class' => 'longinput')))
            ->add('telephone','text', array('attr' => array('class' => 'longinput')))
            ->add('idpays', 'entity', array('empty_value'=>'Sélectionner un Pays','class'=> 'EmpruntBundle:Pays','property' => 'nompays','required' => false
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Banque'
        ));
    }

    public function getName()
    {
        return 'etap_empruntbundle_banquetype';
    }
}
