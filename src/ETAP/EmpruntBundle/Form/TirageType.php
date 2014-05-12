<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TirageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
            ->add('datevaleur','date', array('format'=>'MM dd yyyy'))
            ->add('montant','number', array('attr' => array('class' => 'longinput')))
            ->add('reftirage','number', array('attr' => array('class' => 'longinput')))
            ->add('idcontrat','number', array('attr' => array('class' => 'longinput')))
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
        return 'etap_empruntbundle_tiragetype';
    }
}
