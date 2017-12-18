<?php

namespace EJP\AcademixBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use EJP\AcademixBundle\Entity\Classe;
use EJP\AcademixBundle\Entity\Eleve;
use EJP\AcademixBundle\Entity\Etude;
use EJP\AcademixBundle\Entity\Parents;
use EJP\AcademixBundle\Form\EleveType;
use EJP\AcademixBundle\Service\AnneeScolaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * Eleve controller.
 *
 * @Route("eleve")
 */
class EleveController extends Controller
{


    /**
     * Finds and displays a eleve entity.
     *
     * @Route("/profile", name="eleve_show_user")
     * @Method("GET")
     * @Security("has_role('ROLE_ELEVE')")
     */
    public function showUserAction()
    {

        $eleve = $this->container->get('security.token_storage')->getToken()->getUser();
        $form = $this->createForm('EJP\AcademixBundle\Form\EleveType', $eleve);

        return $this->render('eleve/show_user.html.twig', array(
            'eleve' => $eleve,
            'form' => $form->createView()
        ));
    }


    /**
     * Displays a form to edit an existing eleve entity.
     *
     * @Route("/{id}/editBulletin", name="eleve_edit_bulletin")
     * @Method("POST")
     */
    public function editBulletinAction(Request $request, Eleve $eleve)
    {

        $deleteForm = $this->createDeleteForm($eleve);
        $editForm = $this->createForm('EJP\AcademixBundle\Form\EleveType', $eleve);

        return $this->render('eleve/edit_bulletin.html.twig', array(
            'eleve' => $eleve,
            'form' => $editForm->createView()
        ));
    }



    // Se controlleur est utile pour dire que les parents peuvent se supprimer toute

    /**
     * Displays a form to edit an existing eleve entity.
     *
     * @Route("/{id}/editParents", name="eleve_edit_parents")
     * @Method({"GET", "POST"})
     */
    public function editParentsAction(Request $request, Eleve $eleve)
    {

        $originalParents= new ArrayCollection();

        // Create an ArrayCollection of the current Parent objects in the database
        foreach ($eleve->getParents() as $par) {
            $originalParents->add($par);
        }

        $editForm = $this->createForm('EJP\AcademixBundle\Form\EleveType', $eleve);
        $editForm->handleRequest($request);




        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // remove the relationship between the parent and the Eleve
            foreach ($originalParents as $par) {
                if (false === $eleve->getParents()->contains($par)) {

                    $em->remove($par);
                }
            }

            $em->flush();

            return $this->redirectToRoute('eleve_show', array('id' => $eleve->getId()));
        }

        return $this->render('eleve/edit_parent.html.twig', array(
            'eleve' => $eleve,
            'form' => $editForm->createView()
        ));
    }


    /**
     * Lists all eleve entities.
     *
     * @Route("/", name="eleve_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();


        $eleves = $em->getRepository('EJPAcademixBundle:Eleve')->findAll();

        return $this->render('eleve/index.html.twig', array(
            'eleves' => $eleves
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
        $em = $this->getDoctrine()->getManager();

        $eleve = new Eleve();




        $form = $this->createForm('EJP\AcademixBundle\Form\EleveType', $eleve);
        $form->handleRequest($request);

        $classes = $em->getRepository('EJPAcademixBundle:Classe')->findAll();


        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($eleve);
            $em->flush();

            return $this->redirectToRoute('eleve_index', array('id' => $eleve->getId()));
        }

        return $this->render('eleve/new.html.twig', array(
            'classes' => $classes,
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
        $form = $this->createForm('EJP\AcademixBundle\Form\EleveType', $eleve);

        return $this->render('eleve/show.html.twig', array(
            'eleve' => $eleve,
            'form' => $form->createView()
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
            $em = $this->getDoctrine()->getManager();

           $em->flush();

           return $this->redirectToRoute('eleve_show', array('id' => $eleve->getId()));
        }

        return $this->render('eleve/edit.html.twig', array(
            'eleve' => $eleve,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing eleve entity.
     *
     * @Route("/{id}/edit_classe", name="eleve_edit_classe")
     * @Method("POST")
     */

    public function editeAction(Request $request, Eleve $eleve)
    {
        $em = $this->getDoctrine()->getManager();
        $id_classe = $request->request->get('classe');


        $etude = $eleve->getCurrentEtude();


        $classe = $etude->getClasse();
        $etude->setClasse($classe);
        $em->persist($etude);
        $em->flush();

        return $this->redirectToRoute('eleve_show', array('id' => $eleve->getId()));/*
    */

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
