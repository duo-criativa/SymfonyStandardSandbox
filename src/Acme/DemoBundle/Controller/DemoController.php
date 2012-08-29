<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Form\FormFactoryInterface;

class DemoController extends Controller
{

    /**
     * @Route("/contact", name="_demo_contact")
     * @Template()
     */
    public function contactAction()
    {
        $cidade = $this->getDoctrine()->getRepository('BFOSBrasilBundle:Cidade')->findOneByNome('Vila Velha');
        $data = array('email'=>'contato@acme.com.br', 'message'=> 'Mensagem é escrita aqui.', 'cidade'=>$cidade);
        /**
         * @var FormFactoryInterface $form_factory
         */
        $form_factory = $this->get('form.factory');
        $form = $form_factory->create(new ContactType(), $data);

        $request = $this->get('request');
        if ('POST' == $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $data = $form->getData();
                $mailer = $this->get('mailer');
                // .. setup a message and send it
                // http://symfony.com/doc/current/cookbook/email.html

                $this->get('session')->setFlash('notice', 'Message sent!');

                return new RedirectResponse($this->generateUrl('_demo'));
            }
        }

        return array('form' => $form->createView());
    }

}
