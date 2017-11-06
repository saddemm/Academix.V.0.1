<?php

namespace EJP\AcademixBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/ze")
     */
    public function indexAction()
    {
        return $this->render('EJPAcademixBundle:Default:index.html.twig');
    }
}
