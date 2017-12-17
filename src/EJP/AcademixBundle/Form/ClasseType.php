<?php

namespace EJP\AcademixBundle\Form;

use EJP\AcademixBundle\Entity\Eleve;
use EJP\AcademixBundle\Entity\Enseignant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClasseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',null,array('attr' => array('class' => 'form-control')))
            ->add('eleves', EntityType::class , array(
                'attr' => array('class' => 'ui fluid search dropdown'),
                'required' => false,
                'class'    => Eleve::class,
                'expanded' => false,
                'multiple' => true, ))
            ->add('enseignants', EntityType::class , array(
                'attr' => array('class' => 'ui fluid search dropdown'),
                'required' => false,
                'class'    => Enseignant::class,
                'expanded' => false,
                'multiple' => true, ))
            ->add('niveau', ChoiceType::class, array(
                'attr' => array('class' => 'form-control'),
                'choices'  => array(
                    '1' => "1",
                    '2' => "2",
                    '3' => "3",
                    '4' => "4",
                    '5' => "5",
                    '6' => "6",
                )));

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {


            $datas = $event->getData();
            $form = $event->getForm();

            //Je me suis arrêté la, le dernier parent ne se suprime pas (par ce qu'il recoit le vide

            if (!in_array('nom',array_keys($datas))) {

                $form->remove('nom');

            }

            if (!in_array('eleves',array_keys($datas))) {

                $form->remove('eleves');

            }

            if (!in_array('niveau',array_keys($datas))) {

                $form->remove('niveau');

            }


        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\Classe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_classe';
    }


}
