<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', ChoiceType::class, array(
            'attr' => array('class' => 'form-control'),
            'choices'  => array(
                'Réglement intérieur' => "Réglement intérieur",
                'Fiche d\'inscription' => "Fiche d'inscription",
                'Calandrier scolaire' => "Calandrier scolaire",
                'Fiche des tarifs' => "Fiche des tarifs",
                'Offre d\'emploi' => "Offre d'emploi",
                'Autre' => "Offre d'emploi"
            )))
                ->add('myFile',FileType::class,array('attr' => array('class' => 'dropify', 'data-allowed-file-extensions' => 'doc docx xls xlsx pdf')))
            ->add('etat',CheckboxType::class,array('required' => false, 'attr' => array('class' => 'form-control')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\Document'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_document';
    }


}
