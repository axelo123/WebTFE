<?php

namespace WebTFE\WebTFEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($nom,$prenom)
    {
        $tonton = 'Olivier';
        return $this->render('WebTFEBundle:Default:index.html.twig', array('nom' => $nom,'prenom'=> $prenom, 'tonton'=>$tonton));
    }
}
