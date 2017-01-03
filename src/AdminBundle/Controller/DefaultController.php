<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }
    public function adminAction()
    {
        return new Response('<html><body>Admin Page!</body></html>');
    }
    public function helloAction($name)
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Unable to access this page!', array("hello" => $name));

        return $this->render('AdminBundle:Default:index.html.twig');
    }
    public function wrongRouteAction($url)
    {
        $user = $this->get('security.context')->getToken()->getUser();

        return $this->render('TwigBundle:Exception:error404.html.twig', array("user" => $user, "url" => $url));

    }
}
