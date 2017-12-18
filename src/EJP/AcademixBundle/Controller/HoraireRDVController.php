<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\HoraireRDV;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Horairerdv controller.
 *
 * @Route("horairerdv")
 */
class HoraireRDVController extends Controller
{
    /**
     * Lists all horaireRDV entities.
     *
     * @Route("/", name="horairerdv_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $horaireRDVs = $em->getRepository('EJPAcademixBundle:HoraireRDV')->findAll();

        return $this->render('horairerdv/index.html.twig', array(
            'horaireRDVs' => $horaireRDVs,
        ));
    }

    /**
     * Creates a new horaireRDV entity.
     *
     * @Route("/new", name="horairerdv_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $horaireRDV = new Horairerdv();
        $form = $this->createForm('EJP\AcademixBundle\Form\HoraireRDVType', $horaireRDV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($horaireRDV);
            $em->flush();

            return $this->redirectToRoute('horairerdv_show', array('id' => $horaireRDV->getId()));
        }

        return $this->render('horairerdv/new.html.twig', array(
            'horaireRDV' => $horaireRDV,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a horaireRDV entity.
     *
     * @Route("/{id}", name="horairerdv_show")
     * @Method("GET")
     */
    public function showAction(HoraireRDV $horaireRDV)
    {
        $deleteForm = $this->createDeleteForm($horaireRDV);

        return $this->render('horairerdv/show.html.twig', array(
            'horaireRDV' => $horaireRDV,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing horaireRDV entity.
     *
     * @Route("/{id}/edit", name="horairerdv_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, HoraireRDV $horaireRDV)
    {
        $deleteForm = $this->createDeleteForm($horaireRDV);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\HoraireRDVType', $horaireRDV);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('horairerdv_edit', array('id' => $horaireRDV->getId()));
        }

        return $this->render('horairerdv/edit.html.twig', array(
            'horaireRDV' => $horaireRDV,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a horaireRDV entity.
     *
     * @Route("/{id}", name="horairerdv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, HoraireRDV $horaireRDV)
    {
        $form = $this->createDeleteForm($horaireRDV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($horaireRDV);
            $em->flush();
        }

        return $this->redirectToRoute('horairerdv_index');
    }

    /**
     * Creates a form to delete a horaireRDV entity.
     *
     * @param HoraireRDV $horaireRDV The horaireRDV entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HoraireRDV $horaireRDV)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('horairerdv_delete', array('id' => $horaireRDV->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
