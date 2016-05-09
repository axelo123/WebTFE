<?php

namespace StockHavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('StockHavenBundle:Default:index.html.twig', array('name' => $name));
    }
}
