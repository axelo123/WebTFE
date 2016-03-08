<?php

namespace WebTFEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WebTFEBundle:Default:index.html.twig', array('name' => $name));
    }
}
