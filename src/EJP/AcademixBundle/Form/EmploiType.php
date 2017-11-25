<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EmploiType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('myFile',FileType::class,array('attr' => array('class' => 'form-control')))
                ->add('classe',null,array('attr' => array('class' => 'form-control')))
                ->add('anneeScolaire',null,array('attr' => array('class' => 'form-control')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\Emploi'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_emploi';
    }


}
