<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Utilisateur', UtilisateurType::class)
                ->add('parents', CollectionType::class, array(
                'entry_type' => ParentsType::class,
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
            'data_class' => 'EJP\AcademixBundle\Entity\Eleve'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_eleve';
    }


}
