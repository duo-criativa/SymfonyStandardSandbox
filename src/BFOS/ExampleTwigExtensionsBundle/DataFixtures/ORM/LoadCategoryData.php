<?php

namespace Duo\Linkador\Cobranca\PlanoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BFOS\ExampleTwigExtensionsBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $l = "ABCDEFGHIJLMNOPQRSTUVXZ";
        for($i=1;$i<=200;$i++){
            $c = new Category();
            $c->setName(str_repeat($l[mt_rand(0,strlen($l)-1)],4) . " - Category " . $i);
            $manager->persist($c);
        }

        $manager->flush();

    }

    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}