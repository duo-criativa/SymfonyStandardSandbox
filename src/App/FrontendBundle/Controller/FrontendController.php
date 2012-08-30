<?php

namespace App\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontendController extends Controller
{
    /**
     * @Route("/", name="frontend_home")
     * @Template()
     */
    public function homeAction()
    {
        return array();
    }
}
