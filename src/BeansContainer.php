<?php
namespace MyBuilder\CodeTest;

use MyBuilder\CodeTest\Container\BeansContainerInterface;
use MyBuilder\CodeTest\Container\ContainerFullException;

class BeansContainer extends Container implements BeansContainerInterface
{

    public function addBeans($spoons)
    {
        $this->add($spoons);
    }

    public function useBeans($spoons)
    {
        $this->takeFromContainer($spoons);
    }

    public function getBeans()
    {
        return $this->getFromContainer();
    }
}
