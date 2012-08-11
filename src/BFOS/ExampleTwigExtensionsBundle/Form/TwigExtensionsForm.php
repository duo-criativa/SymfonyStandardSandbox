<?php
namespace BFOS\ExampleTwigExtensionsBundle\Form;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

class TwigExtensionsForm
{
    /**
     * @var Collection $categories
     *
     * @Assert\Count(
     *      min = "1",
     *      max = "5",
     *      minMessage = "You must specify at least one category",
     *      maxMessage = "You cannot specify more than 5 categories"
     * )
     */
    protected $categories;

    /**
     * @param \Doctrine\Common\Collections\Collection $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
