<?php

namespace EJP\AcademixBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnseigneType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('classe',null,array('attr' => array('class' => 'ui fluid dropdown')))
                ->add('enseignant',null,array('attr' => array('class' => 'ui fluid dropdown')));

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {


            $datas = $event->getData();
            $form = $event->getForm();



            //Je me suis arrêté la, le dernier parent ne se suprime pas (par ce qu'il recoit le vide

            if (!in_array('enseignant',array_keys($datas))) {

                $form->remove('enseignant');

            }

            if (!in_array('classe',array_keys($datas))) {

                $form->remove('classe');

            }


        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EJP\AcademixBundle\Entity\Enseigne'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ejp_academixbundle_enseigne';
    }


}
