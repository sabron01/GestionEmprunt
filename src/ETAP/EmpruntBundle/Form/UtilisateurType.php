<?php

namespace ETAP\EmpruntBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule','hidden', array('attr' => array('class' => 'longinput')))
            ->add('nom','text', array('attr' => array('class' => 'longinput')))
            ->add('prenom','text', array('attr' => array('class' => 'longinput')))
            ->add('idprofil', 'entity', array('empty_value'=>'Sélectionner un profil','class'=> 'EmpruntBundle:Profil','property' => 'libelle','required' => false
            ))    
            ->add('login','text', array('attr' => array('class' => 'longinput')))
            ->add('motdepasse','password', array('attr' => array('class' => 'longinput')));
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ETAP\EmpruntBundle\Entity\Utilisateur'
        ));
    }

    public function getName()
    {
        return 'etap_empruntbundle_utilisateurtype';
    }
}
