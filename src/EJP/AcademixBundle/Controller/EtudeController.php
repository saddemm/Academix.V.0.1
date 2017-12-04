<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Etude;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Etude controller.
 *
 * @Route("etude")
 */
class EtudeController extends Controller
{
    /**
     * Lists all etude entities.
     *
     * @Route("/", name="etude_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etudes = $em->getRepository('EJPAcademixBundle:Etude')->findAll();

        return $this->render('etude/index.html.twig', array(
            'etudes' => $etudes,
        ));
    }

    /**
     * Creates a new etude entity.
     *
     * @Route("/new", name="etude_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etude = new Etude();
        $form = $this->createForm('EJP\AcademixBundle\Form\EtudeType', $etude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etude);
            $em->flush();

            return $this->redirectToRoute('etude_show', array('id' => $etude->getId()));
        }

        return $this->render('etude/new.html.twig', array(
            'etude' => $etude,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a etude entity.
     *
     * @Route("/{id}", name="etude_show")
     * @Method("GET")
     */
    public function showAction(Etude $etude)
    {
        $deleteForm = $this->createDeleteForm($etude);

        return $this->render('etude/show.html.twig', array(
            'etude' => $etude,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etude entity.
     *
     * @Route("/{id}/edit", name="etude_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etude $etude)
    {
        $deleteForm = $this->createDeleteForm($etude);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\EtudeType', $etude);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eleve_show', array('id' => $etude->getEleve()->getId()));
        }

        return $this->render('etude/edit.html.twig', array(
            'etude' => $etude,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etude entity.
     *
     * @Route("/{id}", name="etude_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etude $etude)
    {
        $form = $this->createDeleteForm($etude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etude);
            $em->flush();
        }

        return $this->redirectToRoute('etude_index');
    }

    /**
     * Creates a form to delete a etude entity.
     *
     * @param Etude $etude The etude entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etude $etude)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etude_delete', array('id' => $etude->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
