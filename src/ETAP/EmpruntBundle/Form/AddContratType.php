<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddContratType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datesignature','date', array('format'=>'MM dd yyyy'))
            ->add('dureeremboursement','number', array('attr' => array('class' => 'longinput')))
            ->add('intervalleremboursement')
            ->add('marge')
            ->add('monnaiepayement')
            ->add('montantemprunt','number', array('attr' => array('class' => 'longinput')))
            ->add('nbrtirage','hidden', array('attr' => array('class' => 'longinput')))
            ->add('refcontrat','number', array('attr' => array('class' => 'longinput')))
            ->add('tauxdirecteur')
            ->add('idbanque', 'entity', array('empty_value'=>'Sélectionner une Banque','class'=> 'EmpruntBundle:Banque','property' => 'nombanque','required' => false
            ))
            ->add('idbesoin', 'entity', array('empty_value'=>'Sélectionner un Besoin','class'=> 'EmpruntBundle:Besoin','property' => 'libelle','required' => false
            ))   
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Contrat'
        ));
    }

    public function getName()
    {
        return 'etap_empruntbundle_contrattype';
    }
}
