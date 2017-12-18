<?php

namespace EJP\AcademixBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use EJP\AcademixBundle\Entity\Classe;
use EJP\AcademixBundle\Entity\Enseignant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use EJP\AcademixBundle\Form\EnseignantType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Enseignant controller.
 *
 * @Route("enseignant")
 */
class EnseignantController extends Controller
{

    /**
     * Finds and displays a enseignant entity.
     *
     * @Route("/profile", name="enseignant_show_user")
     * @Method("GET")
     * @Security("has_role('ROLE_ENSEIGNANT')")
     */
    public function showUserAction()
    {
        $enseignant = $this->container->get('security.token_storage')->getToken()->getUser();

        $form = $this->createForm('EJP\AcademixBundle\Form\EnseignantType', $enseignant);

        return $this->render('enseignant/show_user.html.twig', array(
            'enseignant' => $enseignant,
            'form' => $form->createView()
        ));
    }



    /**
     * Lists all enseignant entities.
     *
     * @Route("/", name="enseignant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $enseignants = $em->getRepository(Enseignant::class)->findAll();

        return $this->render('enseignant/index.html.twig', array(
            'enseignants' => $enseignants
        ));
    }

    /**
     * Creates a new enseignant entity.
     *
     * @Route("/new", name="enseignant_new")
     * @Method({"GET", "POST"})
     */

    public function newAction(Request $request)
    {
        $enseignant = new Enseignant();

        $form = $this->createForm(EnseignantType::class, $enseignant);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($enseignant);
            $em->flush();

            return $this->redirectToRoute('enseignant_index');

        }

        return $this->render('enseignant/new.html.twig', array(
            'enseignant' => $enseignant,
            'form' => $form->createView(),
        ));


    }


    /*
    public function newAction(Request $request)
    {
        $enseignant = new Enseignant();
        $form = $this->createForm('EJP\AcademixBundle\Form\EnseignantType', $enseignant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $enseignant->setRoles(['ROLE_ENSEIGNANT']);
            $em->persist($enseignant);
            $em->flush();

            return $this->redirectToRoute('enseignant_show', array('id' => $enseignant->getId()));
        }

        return $this->render('enseignant/new.html.twig', array(
            'enseignant' => $enseignant,
            'form' => $form->createView(),
        ));
    }*/

    /**
     * Finds and displays a enseignant entity.
     *
     * @Route("/{id}", name="enseignant_show")
     * @Method("GET")
     */
    public function showAction(Enseignant $enseignant)
    {
        $deleteForm = $this->createDeleteForm($enseignant);

        $form = $this->createForm('EJP\AcademixBundle\Form\EnseignantType', $enseignant);

        return $this->render('enseignant/show.html.twig', array(
            'enseignant' => $enseignant,
            'delete_form' => $deleteForm->createView(),
            'form' => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing classe entity.
     *
     * @Route("/{id}/ensaffectation", name="classe_ens_affectation")
     * @Method("POST")
     */
    public function affectationAction(Request $request, Enseignant $enseignant)
    {

        $editForm = $this->createForm('EJP\AcademixBundle\Form\EnseignantType', $enseignant);

        return $this->render('enseignant/affectation.html.twig', array(
            'form' => $editForm->createView(),
            'enseignant' => $enseignant
        ));
    }

    /**
     * Displays a form to edit an existing enseignant entity.
     *
     * @Route("/{id}/edit", name="enseignant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Enseignant $enseignant)
    {
        $originalEnseignes= new ArrayCollection();


        foreach ($enseignant->getEnseignes() as $en) {
            $originalEnseignes->add($en);
        }


        $deleteForm = $this->createDeleteForm($enseignant);


        $editForm = $this->createForm('EJP\AcademixBundle\Form\EnseignantType', $enseignant);
        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            foreach ($originalEnseignes as $en) {
                if (false === $enseignant->getEnseignes()->contains($en)) {

                    $em->remove($en);
                }
            }


            $em->flush();

            return $this->redirect($request->server->get('HTTP_REFERER'));
        }

        return $this->render('enseignant/edit.html.twig', array(
            'enseignant' => $enseignant,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a enseignant entity.
     *
     * @Route("/delete/{id}", name="enseignant_delete")
     * @Method({"GET", "DELETE"})
     */
    public function deleteAction($id)
    {


            $em = $this->getDoctrine()->getManager();
            $enseignant = $em->getRepository(Enseignant::class)->find($id);
            $em->remove($enseignant);
            $em->flush();


        return $this->redirectToRoute('enseignant_index');
    }


    /**
     * Creates a form to delete a eleve entity.
     *
     * @param Eleve $eleve The eleve entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Enseignant $enseignant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enseignant_delete', array('id' => $enseignant->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


}
