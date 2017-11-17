<?php
/**
 * Created by PhpStorm.
 * User: SaddeM
 * Date: 14/11/2017
 * Time: 14:27
 */


namespace EJP\AcademixBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        // ...

        $content="Vous n'avez pas accés ya 5raa (Hundled exception by me saddem)";

        return new Response($content, 403);
    }
}