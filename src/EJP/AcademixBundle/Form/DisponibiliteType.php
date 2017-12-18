<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DisponibiliteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('jour', ChoiceType::class, array(
            'attr' => array('class' => 'form-control'),
            'choices'  => array(
                'Lundi' => "Lundi",
                'Mardi' => "Mardi",
                'Mercredi' => "Mercredi",
                'Jeudi' => "Jeudi",
                'Vendredi' => "Vendredi",
                'Samedi' => "Samedi",
                'Dimanche' => "Dimanche"
            )))
            ->add('horairesRDV', CollectionType::class, array(
                'entry_type' => HoraireRDVType::class,
                'entry_options' => array('label' => false,'attr' => array('class' => 'form-control')),
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\Disponibilite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_disponibilite';
    }


}
