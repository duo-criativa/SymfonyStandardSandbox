<?php

namespace BFOS\ExampleAdminSettingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ExampleAdminSettingsController extends Controller
{
    /**
     * @Route("/admin/settings")
     * @Template()
     */
    public function indexAction()
    {

        return array();
    }
}
