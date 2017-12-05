<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Emploi;
use EJP\AcademixBundle\Form\EmploiType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Emploi controller.
 *
 * @Route("emploi")
 */
class EmploiController extends Controller
{
    /**
     * Lists all emploi entities.
     *
     * @Route("/", name="emploi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $emploi = new Emploi();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(EmploiType::class, $emploi);




        $emplois = $em->getRepository('EJPAcademixBundle:Emploi')->findAll();

        $deleteForms = array();

        foreach ($emplois as $entity) {
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity)->createView();
        }

        return $this->render('emploi/index.html.twig', array(
            'emplois' => $emplois,
            'form' => $form->createView(),
            'deleteForms' => $deleteForms,
        ));
    }

    /**
     * Creates a new emploi entity.
     *
     * @Route("/new", name="emploi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $emploi = new Emploi();
        $form = $this->createForm('EJP\AcademixBundle\Form\EmploiType', $emploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emploi);
            $em->flush();

            return $this->redirectToRoute('emploi_index');
        }

        return $this->render('emploi/new.html.twig', array(
            'emploi' => $emploi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a emploi entity.
     *
     * @Route("/{id}", name="emploi_show")
     * @Method("GET")
     */
    public function showAction(Emploi $emploi)
    {
        $deleteForm = $this->createDeleteForm($emploi);

        return $this->render('emploi/show.html.twig', array(
            'emploi' => $emploi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing emploi entity.
     *
     * @Route("/{id}/edit", name="emploi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Emploi $emploi)
    {
        $deleteForm = $this->createDeleteForm($emploi);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\EmploiType', $emploi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('emploi_edit', array('id' => $emploi->getId()));
        }

        return $this->render('emploi/edit.html.twig', array(
            'emploi' => $emploi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a emploi entity.
     *
     * @Route("/{id}", name="emploi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Emploi $emploi)
    {
        $form = $this->createDeleteForm($emploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emploi);
            $em->flush();
        }

        return $this->redirectToRoute('emploi_index');
    }

    /**
     * Creates a form to delete a emploi entity.
     *
     * @param Emploi $emploi The emploi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Emploi $emploi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emploi_delete', array('id' => $emploi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
