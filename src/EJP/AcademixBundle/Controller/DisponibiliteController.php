<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Disponibilite;
use EJP\AcademixBundle\Entity\Enseignant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Disponibilite controller.
 *
 * @Route("disponibilite")
 */
class DisponibiliteController extends Controller
{
    /**
     * Lists all disponibilite entities.
     *
     * @Route("/", name="disponibilite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $disponibilites = $em->getRepository('EJPAcademixBundle:Disponibilite')->findAll();

        return $this->render('disponibilite/index.html.twig', array(
            'disponibilites' => $disponibilites,
        ));
    }

    /**
     * Creates a new disponibilite entity.
     *
     * @Route("/new", name="disponibilite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $disponibilite = new Disponibilite();

        $enseignant = $this->container->get('security.token_storage')->getToken()->getUser();
        $disponibilite->setEnseignant($enseignant);

        $form = $this->createForm('EJP\AcademixBundle\Form\DisponibiliteType', $disponibilite);
        $form->handleRequest($request);

        /** @var Enseignant $enseignant */


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($disponibilite);
            $em->flush();

            return $this->redirectToRoute('disponibilite_show', array('id' => $disponibilite->getId()));
        }

        return $this->render('disponibilite/new.html.twig', array(
            'disponibilite' => $disponibilite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a disponibilite entity.
     *
     * @Route("/{id}", name="disponibilite_show")
     * @Method("GET")
     */
    public function showAction(Disponibilite $disponibilite)
    {
        $deleteForm = $this->createDeleteForm($disponibilite);

        return $this->render('disponibilite/show.html.twig', array(
            'disponibilite' => $disponibilite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing disponibilite entity.
     *
     * @Route("/{id}/edit", name="disponibilite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Disponibilite $disponibilite)
    {
        $deleteForm = $this->createDeleteForm($disponibilite);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\DisponibiliteType', $disponibilite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('disponibilite_edit', array('id' => $disponibilite->getId()));
        }

        return $this->render('disponibilite/edit.html.twig', array(
            'disponibilite' => $disponibilite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a disponibilite entity.
     *
     * @Route("/{id}", name="disponibilite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Disponibilite $disponibilite)
    {
        $form = $this->createDeleteForm($disponibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($disponibilite);
            $em->flush();
        }

        return $this->redirectToRoute('disponibilite_index');
    }

    /**
     * Creates a form to delete a disponibilite entity.
     *
     * @param Disponibilite $disponibilite The disponibilite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Disponibilite $disponibilite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('disponibilite_delete', array('id' => $disponibilite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
