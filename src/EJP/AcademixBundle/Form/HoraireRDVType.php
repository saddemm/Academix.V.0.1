<?php

namespace EJP\AcademixBundle\Form;

use EJP\AcademixBundle\Service\Rangeme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HoraireRDVType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('heureDebut',ChoiceType::class,array('choices'  => Rangeme::rangeme(8,18),'label' => 'À partir de quelle heur ?', 'attr' => array('class' => 'form-control')))
            ->add('heureFin',ChoiceType::class,array('choices'  => Rangeme::rangeme(8,18), 'label' => 'Jusqu\'à de quelle heur ?', 'attr' => array('class' => 'form-control')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\HoraireRDV'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_horairerdv';
    }


}
