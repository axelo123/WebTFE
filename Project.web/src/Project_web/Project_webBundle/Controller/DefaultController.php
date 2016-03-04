<?php

namespace Project_web\Project_webBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Project_webBundle:Default:index.html.twig', array('name' => $name));
    }
}
