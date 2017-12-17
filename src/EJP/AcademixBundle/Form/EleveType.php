<?php

namespace EJP\AcademixBundle\Form;

use Doctrine\Common\Collections\ArrayCollection;
use EJP\AcademixBundle\Entity\Classe;
use EJP\AcademixBundle\Entity\Eleve;
use EJP\AcademixBundle\Entity\Parents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('bulletin',FileType::class,array('required' => false, 'attr' => array('class' => 'dropify', 'data-allowed-file-extensions' => 'doc docx xls xlsx pdf')))
            ->add('parents', CollectionType::class, array(
                'entry_type' => ParentsType::class,
                'entry_options' => array('label' => false,'attr' => array('class' => 'form-control')),
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true
            ))
            ->add('currentClasse', EntityType::class , array(
                'attr' => array('class' => 'form-control'),
                'required' => false,
                'class'    => Classe::class,
                'expanded' => false,
                'multiple' => false, ));



        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {


            $eleve = $event->getData();
            $form = $event->getForm();


              if (!in_array('parents',array_keys($eleve)) && count($eleve)>0) {

                $form->remove('parents');

            }

            if (!in_array('currentClasse',array_keys($eleve))) {

                $form->remove('currentClasse');

            }

            if (!in_array('bulletin',array_keys($eleve))) {

                $form->remove('bulletin');

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
