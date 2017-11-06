<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LuckyController extends controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }

    /**
     * @Route("/slug/{number}", name="blog_list", requirements={"number": "\d+"})
     */
    public function numberzAction($number = 1)
    {


        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}

