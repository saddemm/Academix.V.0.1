<?php

namespace EJP\AcademixBundle\Form;

use Doctrine\Common\Collections\ArrayCollection;
use EJP\AcademixBundle\Entity\Eleve;
use EJP\AcademixBundle\Entity\Parents;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
            ))
            ->add('currentEtudes', CollectionType::class, array(
                'entry_type' => EtudeType::class,
                'entry_options' => array('label' => false,'attr' => array('class' => 'form-control')),
                'allow_add' => true,
                'by_reference' => false

            ));



        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {


            $eleve = $event->getData();
            $form = $event->getForm();
            $eleveObj = $form->getData();



            //Je me suis arrêté la, le dernier parent ne se suprime pas (par ce qu'il recoit le vide

              if (!in_array('parents',array_keys($eleve)) && count($eleve)>0) {

                $form->remove('parents');

            }

            if (!in_array('currentEtudes',array_keys($eleve))) {

                $form->remove('currentEtudes');

            }

            if (!in_array('Utilisateur',array_keys($eleve))) {

                $form->remove('Utilisateur');

            }


        });


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
