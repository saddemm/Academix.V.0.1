<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',null,array('attr' => array('class' => 'form-control')))
            ->add('description',TextareaType::class,array('attr' => array('class' => 'form-control')))
            ->add('dateEvenement',DateType::class,array('widget' => 'single_text','attr' => array('class' => 'form-control')))
            ->add('heureDebut',null,array('attr' => array('class' => 'form-control')))
            ->add('heureFin',null,array('attr' => array('class' => 'form-control')))
            ->add('enseignants',null,array('attr' => array('class' => 'selectpicker','data-actions-box'=>'true')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\Evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_evenement';
    }


}
