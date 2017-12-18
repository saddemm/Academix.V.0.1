<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Enseigne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Enseigne controller.
 *
 * @Route("enseigne")
 */
class EnseigneController extends Controller
{
    /**
     * Lists all enseigne entities.
     *
     * @Route("/", name="enseigne_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $enseignes = $em->getRepository('EJPAcademixBundle:Enseigne')->findAll();

        return $this->render('enseigne/index.html.twig', array(
            'enseignes' => $enseignes,
        ));
    }

    /**
     * Creates a new enseigne entity.
     *
     * @Route("/new", name="enseigne_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $enseigne = new Enseigne();
        $form = $this->createForm('EJP\AcademixBundle\Form\EnseigneType', $enseigne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($enseigne);
            $em->flush();

            return $this->redirectToRoute('enseigne_show', array('id' => $enseigne->getId()));
        }

        return $this->render('enseigne/new.html.twig', array(
            'enseigne' => $enseigne,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a enseigne entity.
     *
     * @Route("/{id}", name="enseigne_show")
     * @Method("GET")
     */
    public function showAction(Enseigne $enseigne)
    {
        $deleteForm = $this->createDeleteForm($enseigne);

        return $this->render('enseigne/show.html.twig', array(
            'enseigne' => $enseigne,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing enseigne entity.
     *
     * @Route("/{id}/edit", name="enseigne_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Enseigne $enseigne)
    {
        $deleteForm = $this->createDeleteForm($enseigne);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\EnseigneType', $enseigne);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enseignant_show', array('id' => $enseigne->getEnseignant()->getId()));
        }

        return $this->render('enseigne/edit.html.twig', array(
            'enseigne' => $enseigne,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a enseigne entity.
     *
     * @Route("/{id}", name="enseigne_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Enseigne $enseigne)
    {
        $form = $this->createDeleteForm($enseigne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($enseigne);
            $em->flush();
        }

        return $this->redirectToRoute('enseigne_index');
    }

    /**
     * Creates a form to delete a enseigne entity.
     *
     * @param Enseigne $enseigne The enseigne entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Enseigne $enseigne)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enseigne_delete', array('id' => $enseigne->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
