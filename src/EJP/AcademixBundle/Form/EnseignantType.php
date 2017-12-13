<?php

namespace EJP\AcademixBundle\Form;

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
                ->add('currentEnseigne',EnseigneType::class);


        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {


            $enseignant = $event->getData();
            $form = $event->getForm();



            //Je me suis arrêté la, le dernier parent ne se suprime pas (par ce qu'il recoit le vide


            if (!in_array('currentEnseigne',array_keys($enseignant))) {

                $form->remove('currentEnseigne');

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
