<?php

namespace BFOS\ExamplePagseguroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\EntityRepository;
use BFOS\PagseguroBundle\Entity\Pagamento;

/**
 * @Route("/example/pagseguro-bundle")
 */
class ExamplePagseguroController extends Controller
{
    /**
     * @return EntityRepository
     */
    public function getRepository(){
        return $this->getDoctrine()->getRepository('BFOSPagseguroBundle:Pagamento');
    }
    /**
     * @Route("/pagamentos", name="frontend_pagseguro_pagamentos")
     * @Template()
     */
    public function indexAction()
    {
        $pagamentos = $this->getRepository()->findAll();
        return array('pagamentos' => $pagamentos);
    }

    /**
     * @Route("/pagamentos/novo", name="frontend_pagseguro_pagamentos_novo")
     * @Template()
     */
    public function novoAction()
    {
        $pagamento = new Pagamento();

        return array('pagamento' => $pagamento);
    }


}
