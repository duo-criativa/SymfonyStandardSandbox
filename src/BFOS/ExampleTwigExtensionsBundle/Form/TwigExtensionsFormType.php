<?php
namespace BFOS\ExampleTwigExtensionsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormBuilderInterface;

class TwigExtensionsFormType extends AbstractType
{
    /**
     * @var ContainerInterface $container
     */
    protected $container;

    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $url = $this->container->get('router')->generate('bfos_example_twig_extensions_categories_autocomplete');
        $builder->add('categories', 'bfos_fcbkcomplete_entity',
            array('class'=>'BFOS\ExampleTwigExtensionsBundle\Entity\Category',
                'url'=>$url,
                'fcbkcomplete_options'=>array('maxitems'=>40, 'maxshownitems'=>40),
                'required'=>true
            )
        );
        $builder->add('someDate', 'bfos_date');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'bfos_twig_extensions_form';
    }


}
