<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Sanction;
use EJP\AcademixBundle\Service\Notifier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sanction controller.
 *
 * @Route("sanction")
 */
class SanctionController extends Controller
{
    /**
     * Lists all sanction entities.
     *
     * @Route("/", name="sanction_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sanctions = $em->getRepository('EJPAcademixBundle:Sanction')->findAll();

        return $this->render('sanction/index.html.twig', array(
            'sanctions' => $sanctions,
        ));
    }

    /**
     * Creates a new sanction entity.
     *
     * @Route("/new", name="sanction_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sanction = new Sanction();
        $form = $this->createForm('EJP\AcademixBundle\Form\SanctionType', $sanction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($sanction);
            $em->flush();

            //return new Response(Notifier::sanctionNotifier("AIzaSyAd-JDmk8r4PSuA-zvn4CS65344URZ8-vQ","cJr2XzOmlQc:APA91bH3zeXNgBj0665KImeMd9TuTrs6rPlHHvZpW82FUF_IdZsI9XhKT-cj9ON4imRetcPHKk2M8hfhkaW6-n2mSwEBQGDNqLsDjtGYIfECnYgVJVNN-NoZQ739wXzQprsda2V4UGEK",$sanction->getCause()));

            return $this->redirectToRoute('sanction_show', array('id' => $sanction->getId()));
        }

        return $this->render('sanction/new.html.twig', array(
            'sanction' => $sanction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sanction entity.
     *
     * @Route("/{id}", name="sanction_show")
     * @Method("GET")
     */
    public function showAction(Sanction $sanction)
    {
        $deleteForm = $this->createDeleteForm($sanction);

        return $this->render('sanction/show.html.twig', array(
            'sanction' => $sanction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sanction entity.
     *
     * @Route("/{id}/edit", name="sanction_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sanction $sanction)
    {
        $deleteForm = $this->createDeleteForm($sanction);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\SanctionType', $sanction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sanction_edit', array('id' => $sanction->getId()));
        }

        return $this->render('sanction/edit.html.twig', array(
            'sanction' => $sanction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sanction entity.
     *
     * @Route("/{id}", name="sanction_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sanction $sanction)
    {
        $form = $this->createDeleteForm($sanction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sanction);
            $em->flush();
        }

        return $this->redirectToRoute('sanction_index');
    }

    /**
     * Creates a form to delete a sanction entity.
     *
     * @param Sanction $sanction The sanction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sanction $sanction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sanction_delete', array('id' => $sanction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
