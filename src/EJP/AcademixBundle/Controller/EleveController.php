<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Eleve;
use EJP\AcademixBundle\Form\EleveType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Eleve controller.
 *
 * @Route("eleve")
 */
class EleveController extends Controller
{
    /**
     * Lists all eleve entities.
     *
     * @Route("/", name="eleve_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $eleve = new Eleve();


        $form = $this->createForm(EleveType::class, $eleve);

        $em = $this->getDoctrine()->getManager();

        $eleves = $em->getRepository('EJPAcademixBundle:Eleve')->findAll();

        return $this->render('eleve/index.html.twig', array(
            'eleves' => $eleves,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new eleve entity.
     *
     * @Route("/new", name="eleve_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $eleve = new Eleve();
        $form = $this->createForm('EJP\AcademixBundle\Form\EleveType', $eleve);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();

            return $this->redirectToRoute('eleve_index', array('id' => $eleve->getId()));
        }

        return $this->render('eleve/new.html.twig', array(
            'eleve' => $eleve,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a eleve entity.
     *
     * @Route("/{id}", name="eleve_show")
     * @Method("GET")
     */
    public function showAction(Eleve $eleve)
    {
        $deleteForm = $this->createDeleteForm($eleve);

        return $this->render('eleve/show.html.twig', array(
            'eleve' => $eleve,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing eleve entity.
     *
     * @Route("/{id}/edit", name="eleve_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Eleve $eleve)
    {
        $deleteForm = $this->createDeleteForm($eleve);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\EleveType', $eleve);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eleve_edit', array('id' => $eleve->getId()));
        }

        return $this->render('eleve/edit.html.twig', array(
            'eleve' => $eleve,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a eleve entity.
     *
     * @Route("/{id}", name="eleve_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Eleve $eleve)
    {
        $form = $this->createDeleteForm($eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eleve);
            $em->flush();
        }

        return $this->redirectToRoute('eleve_index');
    }

    /**
     * Creates a form to delete a eleve entity.
     *
     * @param Eleve $eleve The eleve entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Eleve $eleve)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eleve_delete', array('id' => $eleve->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
