<?php

namespace Skonsoft\VehicleManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SkonsoftVehicleManagerBundle:Default:index.html.twig', array('name' => $name));
    }
}
