<?php

namespace EJP\AcademixBundle\Controller;

use EJP\AcademixBundle\Entity\Testy;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Testy controller.
 *
 */
class TestyController extends Controller
{
    /**
     * Lists all testy entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $testies = $em->getRepository('EJPAcademixBundle:Testy')->findAll();

        return $this->render('testy/index.html.twig', array(
            'testies' => $testies,
        ));
    }

    /**
     * Finds and displays a testy entity.
     *
     */
    public function showAction(Testy $testy)
    {

        return $this->render('testy/show.html.twig', array(
            'testy' => $testy,
        ));
    }
}
