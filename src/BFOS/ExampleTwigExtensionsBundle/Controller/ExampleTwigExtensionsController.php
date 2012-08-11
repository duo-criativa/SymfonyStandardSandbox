<?php

namespace BFOS\ExampleTwigExtensionsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BFOS\ExampleTwigExtensionsBundle\Form\TwigExtensionsForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BFOS\ExampleTwigExtensionsBundle\Form\TwigExtensionsFormType;

class ExampleTwigExtensionsController extends Controller
{
    /**
     * @Route("/bfos/twig-extensions/form", name="bfos_te_form")
     * @Template()
     */
    public function formAction()
    {
        $form = $this->createForm(new TwigExtensionsFormType($this->container), new TwigExtensionsForm());

        if($this->getRequest()->isMethod('post')){
            $form->bind($this->getRequest());
            if($form->isValid()){
                $this->get('session')->setFlash('notice', 'This form is valid!');
            } else {
                $this->get('session')->setFlash('error', 'This form is NOT valid!');
            }
        }
        return array('form'=>$form->createView());
    }

    /**
     * @Route("/bfos/twig-extensions/categories-autocomplete", name="bfos_te_categories_autocomplete")
     * @Method("get")
     */
    public function categoriesAutocompleteAction(){
        if(!($q = $this->getRequest()->get('tag'))){
            return new \Symfony\Component\HttpFoundation\Response('');
        }

        $arr = array();
        $cats = $this->get('bfos_example_twig_extensions.category_manager')->findForAutoComplete($q);
        foreach($cats as $cat){
            $arr[] = array('key'=> (string) $cat->getId(), 'value'=> $cat->getName()) ;
        }
        return new \Symfony\Component\HttpFoundation\Response(json_encode($arr), 200, array('Content-Type'=> 'application/json'));
    }
}
