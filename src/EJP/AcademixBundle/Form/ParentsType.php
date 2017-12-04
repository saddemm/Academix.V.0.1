<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ParentsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('prenom',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('tel',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('email',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('adr',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('responsable',CheckboxType::class,array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('methodeContact', ChoiceType::class, array(
                'attr' => array('class' => 'form-control'),
                'choices'  => array(
                    'Téléphone' => "Téléphone",
                    'Email' => "Email",
                    'Poste' => "Poste"
                )))
            ->add('type', ChoiceType::class, array(
                'attr' => array('class' => 'form-control'),
                'choices'  => array(
                    'Père' => "Père",
                    'Mère' => "Mère",
                    'Frère' => "Frère",
                    'Soeur' => "Soeur",
                    'Autre' => "Autre"
                )));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\Parents'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_parents';
    }


}
