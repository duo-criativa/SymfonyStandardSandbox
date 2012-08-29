<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            // BFOS bundles
            new BFOS\BrasilBundle\BFOSBrasilBundle(),
            new BFOS\SettingsManagementBundle\BFOSSettingsManagementBundle(),
            new BFOS\TwigExtensionsBundle\BFOSTwigExtensionsBundle(),
            new BFOS\PagseguroBundle\BFOSPagseguroBundle(),

            // project bundles
            new App\AdminBundle\AppAdminBundle(),
            new App\FrontendBundle\AppFrontendBundle(),
            new App\FrameworkBundle\AppFrameworkBundle(),
            new BFOS\ExamplePagseguroBundle\BFOSExamplePagseguroBundle(),
            new BFOS\ExampleTwigExtensionsBundle\BFOSExampleTwigExtensionsBundle(),
            new BFOS\ExampleAdminSettingsBundle\BFOSExampleAdminSettingsBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
