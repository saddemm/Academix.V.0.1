<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\LastCon;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lastcon controller.
 *
 * @Route("lastcon")
 */
class LastConController extends Controller
{
    /**
     * Lists all lastCon entities.
     *
     * @Route("/", name="lastcon_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lastCons = $em->getRepository('EJPAcademixBundle:LastCon')->findAll();

        return $this->render('lastcon/index.html.twig', array(
            'lastCons' => $lastCons,
        ));
    }

    /**
     * Creates a new lastCon entity.
     *
     * @Route("/new", name="lastcon_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lastCon = new Lastcon();
        $form = $this->createForm('EJP\AcademixBundle\Form\LastConType', $lastCon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lastCon);
            $em->flush();

            return $this->redirectToRoute('lastcon_show', array('id' => $lastCon->getId()));
        }

        return $this->render('lastcon/new.html.twig', array(
            'lastCon' => $lastCon,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lastCon entity.
     *
     * @Route("/{id}", name="lastcon_show")
     * @Method("GET")
     */
    public function showAction(LastCon $lastCon)
    {
        $deleteForm = $this->createDeleteForm($lastCon);

        return $this->render('lastcon/show.html.twig', array(
            'lastCon' => $lastCon,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lastCon entity.
     *
     * @Route("/{id}/edit", name="lastcon_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LastCon $lastCon)
    {
        $deleteForm = $this->createDeleteForm($lastCon);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\LastConType', $lastCon);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lastcon_edit', array('id' => $lastCon->getId()));
        }

        return $this->render('lastcon/edit.html.twig', array(
            'lastCon' => $lastCon,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lastCon entity.
     *
     * @Route("/{id}", name="lastcon_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LastCon $lastCon)
    {
        $form = $this->createDeleteForm($lastCon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lastCon);
            $em->flush();
        }

        return $this->redirectToRoute('lastcon_index');
    }

    /**
     * Creates a form to delete a lastCon entity.
     *
     * @param LastCon $lastCon The lastCon entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LastCon $lastCon)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lastcon_delete', array('id' => $lastCon->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
