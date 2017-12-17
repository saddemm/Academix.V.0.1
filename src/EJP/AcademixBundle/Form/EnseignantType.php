<?php

namespace EJP\AcademixBundle\Form;

use EJP\AcademixBundle\Entity\Classe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EnseignantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Utilisateur', UtilisateurType::class)
                ->add('dateRecrutement',DateType::class,array('widget' => 'single_text','attr' => array('class' => 'form-control')))
                ->add('matiere',null,array('attr' => array('class' => 'form-control')))
                ->add('bassas', EntityType::class , array(
                'attr' => array('class' => 'ui fluid search dropdown'),
                'required' => false,
                'class'    => Classe::class,
                'expanded' => false,
                'multiple' => true, ));

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {


            $enseignant = $event->getData();
            $form = $event->getForm();




            if (!in_array('bassas',array_keys($enseignant)) && count($enseignant)>0) {

                $form->remove('bassas');

            }

            if (!in_array('Utilisateur',array_keys($enseignant))) {

                $form->remove('Utilisateur');

            }

            if (!in_array('dateRecrutement',array_keys($enseignant))) {

                $form->remove('dateRecrutement');

            }

            if (!in_array('matiere',array_keys($enseignant))) {

                $form->remove('matiere');

            }



        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\Enseignant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_enseignant';
    }


}
