<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ParentsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomMere',null,array('attr' => array('class' => 'form-control')))
            ->add('nomPere',null,array('attr' => array('class' => 'form-control')))
            ->add('telMere',null,array('attr' => array('class' => 'form-control')))
            ->add('telPere',null,array('attr' => array('class' => 'form-control')))
            ->add('emailMere',null,array('attr' => array('class' => 'form-control')))
            ->add('emailPere',null,array('attr' => array('class' => 'form-control')))
            ->add('adrMere',null,array('attr' => array('class' => 'form-control')))
            ->add('adrPere',null,array('attr' => array('class' => 'form-control')))
            ->add('methodeContact', ChoiceType::class, array(
                'choices'  => array(
                    'Telephone' => "Telephone",
                    'Email' => "Email",
                    'Poste' => "Poste",
                ),
                'attr' => array(
                    'class' => 'form-control'
                )
            ))->add('responsable', ChoiceType::class, array(
                'choices'  => array(
                    'Mère' => "Mère",
                    'Père' => "Père"
                ),
                'attr' => array(
                    'class' => 'form-control'
                )
            ));
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
