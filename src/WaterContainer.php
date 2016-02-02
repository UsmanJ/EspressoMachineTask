<?php
namespace MyBuilder\CodeTest;

use MyBuilder\CodeTest\Container\WaterContainerInterface;
use MyBuilder\CodeTest\Container\ContainerFullException;
use MyBuilder\CodeTest\Container\EspressoMachineContainerException;

class WaterContainer extends Container implements WaterContainerInterface
{
    public function addWater($litres)
    {
        $this->addToContainer($litres);
    }

    public function useWater($litres)
    {
        $this->takeFromContainer($litres);
    }

    public function getWater()
    {
        return $this->getFromContainer();
    }
}
