<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContratType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datesignature')
            ->add('dureeremboursement')
            ->add('intervalleremboursement')
            ->add('marge')
            ->add('monnaiepayement')
            ->add('montantemprunt')
            ->add('nbrtirage')
            ->add('refcontrat')
            ->add('tauxdirecteur')
            ->add('idbanque')
            ->add('idbesoin')
            ->add('idcommission')
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
