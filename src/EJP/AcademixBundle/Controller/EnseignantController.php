<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Enseignant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use EJP\AcademixBundle\Form\EnseignantType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Enseignant controller.
 *
 * @Route("enseignant")
 */
class EnseignantController extends Controller
{
    /**
     * Lists all enseignant entities.
     *
     * @Route("/", name="enseignant_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $enseignant = new Enseignant();

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(EnseignantType::class, $enseignant);

        $enseignants = $em->getRepository(Enseignant::class)->findAll();

        return $this->render('enseignant/index.html.twig', array(
            'enseignants' => $enseignants,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new enseignant entity.
     *
     * @Route("/new", name="enseignant_new")
     * @Method({"GET", "POST"})
     */

    public function newAction(Request $request)
    {
        $enseignant = new Enseignant();

        $form = $this->createForm(EnseignantType::class, $enseignant);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($enseignant);
            $em->flush();

            return $this->redirectToRoute('enseignant_index');

        }

        $validator = $this->get('validator');
        $errors = $validator->validate($enseignant);
        if (count($errors) > 0) {
            return new Response($errors);
        }


    }


    /*
    public function newAction(Request $request)
    {
        $enseignant = new Enseignant();
        $form = $this->createForm('EJP\AcademixBundle\Form\EnseignantType', $enseignant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $enseignant->setRoles(['ROLE_ENSEIGNANT']);
            $em->persist($enseignant);
            $em->flush();

            return $this->redirectToRoute('enseignant_show', array('id' => $enseignant->getId()));
        }

        return $this->render('enseignant/new.html.twig', array(
            'enseignant' => $enseignant,
            'form' => $form->createView(),
        ));
    }*/

    /**
     * Finds and displays a enseignant entity.
     *
     * @Route("/{id}", name="enseignant_show")
     * @Method("GET")
     */
    public function showAction(Enseignant $enseignant)
    {
        $deleteForm = $this->createDeleteForm($enseignant);

        return $this->render('enseignant/show.html.twig', array(
            'enseignant' => $enseignant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing enseignant entity.
     *
     * @Route("/{id}/edit", name="enseignant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Enseignant $enseignant)
    {
        $deleteForm = $this->createDeleteForm($enseignant);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\EnseignantType', $enseignant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enseignant_edit', array('id' => $enseignant->getId()));
        }

        return $this->render('enseignant/edit.html.twig', array(
            'enseignant' => $enseignant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a enseignant entity.
     *
     * @Route("/delete/{id}", name="enseignant_delete")
     * @Method({"GET", "DELETE"})
     */
    public function deleteAction($id)
    {


            $em = $this->getDoctrine()->getManager();
            $enseignant = $em->getRepository(Enseignant::class)->find($id);
            $em->remove($enseignant);
            $em->flush();


        return $this->redirectToRoute('enseignant_index');
    }


}
