<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Saddem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Saddem controller.
 *
 * @Route("saddem")
 */
class SaddemController extends Controller
{
    /**
     * Lists all saddem entities.
     *
     * @Route("/", name="saddem_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $saddems = $em->getRepository('EJPAcademixBundle:Saddem')->findAll();

        return $this->render('saddem/index.html.twig', array(
            'saddems' => $saddems,
        ));
    }

    /**
     * Creates a new saddem entity.
     *
     * @Route("/new", name="saddem_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $saddem = new Saddem();
        $form = $this->createForm('EJP\AcademixBundle\Form\SaddemType', $saddem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($saddem);
            $em->flush();

            return $this->redirectToRoute('saddem_show', array('id' => $saddem->getId()));
        }

        return $this->render('saddem/new.html.twig', array(
            'saddem' => $saddem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a saddem entity.
     *
     * @Route("/{id}", name="saddem_show")
     * @Method("GET")
     */
    public function showAction(Saddem $saddem)
    {
        $deleteForm = $this->createDeleteForm($saddem);

        return $this->render('saddem/show.html.twig', array(
            'saddem' => $saddem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing saddem entity.
     *
     * @Route("/{id}/edit", name="saddem_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Saddem $saddem)
    {
        $deleteForm = $this->createDeleteForm($saddem);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\SaddemType', $saddem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('saddem_edit', array('id' => $saddem->getId()));
        }

        return $this->render('saddem/edit.html.twig', array(
            'saddem' => $saddem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a saddem entity.
     *
     * @Route("/{id}", name="saddem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Saddem $saddem)
    {
        $form = $this->createDeleteForm($saddem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($saddem);
            $em->flush();
        }

        return $this->redirectToRoute('saddem_index');
    }

    /**
     * Creates a form to delete a saddem entity.
     *
     * @param Saddem $saddem The saddem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Saddem $saddem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('saddem_delete', array('id' => $saddem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
