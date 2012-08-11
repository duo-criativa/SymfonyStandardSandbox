<?php
namespace BFOS\ExampleTwigExtensionsBundle\Entity;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityRepository;

class CategoryManager
{
    /**
     * @var ContainerInterface $container
     */
    protected $container;

    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return EntityRepository
     */
    public function getRepository(){
        return $this->container->get('doctrine')->getRepository('BFOSExampleTwigExtensionsBundle:Category');
    }

    public function findForAutoComplete($string, $limit = 20){
        if(!$string){
            return array();
        }

        $qb = $this->getRepository()->createQueryBuilder('u');
        $query = $qb->where('u.name LIKE :str')->setParameter('str', "%$string%")->getQuery();
        return $query->setMaxResults($limit)->getResult();
    }
}
