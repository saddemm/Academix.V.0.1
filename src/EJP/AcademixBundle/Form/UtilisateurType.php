<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('prenom',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('adresse',TextareaType::class,array('attr' => array('class' => 'form-control')))
            ->add('email',EmailType::class,array('attr' => array('class' => 'form-control')))
            ->add('telephone',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('myFile',FileType::class,array('required' => false, 'attr' => array('class' => 'dropify', 'data-allowed-file-extensions' => 'jpg jpeg png')))
            ->add('dateNaissance',DateType::class,array('widget' => 'single_text', 'attr' => array('class' => 'form-control')))
            ->add('sex', ChoiceType::class, array(
                'attr' => array('class' => 'form-control'),
                'choices'  => array(
                    'H' => "H",
                    'F' => "F"
                )));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'inherit_data' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_utilisateur';
    }


}
