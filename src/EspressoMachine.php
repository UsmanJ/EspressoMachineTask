<?php

namespace MyBuilder\CodeTest;

use MyBuilder\CodeTest\Container\BeansContainerInterface;
use MyBuilder\CodeTest\Container\WaterContainerInterface;
use MyBuilder\CodeTest\Container\ContainerFullException;
use MyBuilder\CodeTest\Container\EspressoMachineContainerException;
use MyBuilder\CodeTest\Machine\EspressoMachineInterface;
use MyBuilder\CodeTest\Machine\EspressoMachineException;
use MyBuilder\CodeTest\Machine\NoBeansException;
use MyBuilder\CodeTest\Machine\NoWaterException;
use MyBuilder\CodeTest\Machine\DescaleNeededException;

/**
 * A single espresso uses 1 spoon of beans and 0.05 litres of water
 * A double espresso uses 2 spoons of beans and 0.10 litres of water
 *
 * The machine MUST be descaled after every 5 litres of Espresso made
 *    Descaling uses 1 litres of water
 *    You CANNOT make coffee while the machine needs descaling
 *    The machine will start with no beans or water in its containers
 *
 */

class EspressoMachine implements EspressoMachineInterface
{

    private $beansContainer;
    private $waterContainer;
    private $amountMade = 0;
    private $descaling = false;
    private $needsDescaling = false;

    public function __construct(WaterContainer $waterContainer, BeansContainer $beansContainer) {
        $this->waterContainer = $waterContainer;
        $this->beansContainer = $beansContainer;
    }

    /**
     * Runs the process to descale the machine
     * so the machine can be used make coffee
     * uses 1 litre of water
     *
     * @throws NoWaterException
     *
     * @return void
     */

    public function descale()
    {
      if($this->waterContainer->getWater() < 1) {
        throw new NoWaterException();
      }
      $this->waterContainer->useWater(1);
      $this->needsDescaling = false;
      return void;
    }

    /**
     * Runs the process for making Espresso
     *
     * @throws DescaleNeededException When the machine needs descaled and cannot make coffee
     * @throws NoBeansException When there is not enough beans to make the coffee
     * @throws NoWaterException When there is not enough water to make the coffee
     *
     * @return float of litres of coffee made
     */

    public function makeEspresso()
    {
      if($this->needsDescaling) {
        throw new DescaleNeededException();
      }
      if($this->beansContainer->getBeans() < 1) {
        throw new NoBeansException();
      }
      if($this->waterContainer->getWater() < 0.05) {
        throw new NoWaterException();
      }
      return $this->makeCoffee(0.05, 1);
      $this->amountMade + 1;
      if($this->amountMade() > 4.95) {
        $this->needsDescaling = true;
      }
      return $this->amountMade() . " litres of coffee made";
    }

    /**
     * @see makeEspresso
     *
     * @throws DescaleNeededException When the machine needs descaled and cannot make coffee
     * @throws NoBeansException When there is not enough beans to make the coffee
     * @throws NoWaterException When there is not enough water to make the coffee
     *
     * @return float of litres of coffee made
     */

    public function makeDoubleEspresso()
    {
      if($this->needsDescaling) {
        throw new DescaleNeededException();
      }
      if($this->beansContainer->getBeans() < 2) {
        throw new NoBeansException();
      }
      if($this->waterContainer->getWater() < 0.1) {
        throw new NoWaterException();
      }
      return $this->makeCoffee(0.1, 2);
      $this->amountMade + 2;
      if($this->amountMade() > 4.5) {
        $this->needsDescaling = true;
      }
      return $this->amountMade() . " litres of coffee made";
    }

    /**
     * This method controls what is displayed on the screen of the machine
     * Returns ONE of the following human readable statuses in the following preference order:
     *
     * Descale needed
     * Add beans and water
     * Add beans
     * Add water
     * {Integer} Espressos left
     *
     * Please note you should return "Add water" if the machine needs descaling and doesn't have enough water
     *
     * @return string
     */

    public function getStatus()
    {
      if($this->needsDescaling) {
          if($this->getWater() < 1) {
              return 'Add water';
          }
          return 'Descale needed';
      }
      if($this->getWater() <= 0 && $this->getBeans() <= 0) {
          return 'Add beans and water';
      }
      if($this->getBeans() <= 0) {
          return 'Add beans';
      }
      if($this->getWater() <= 0) {
          return 'Add water';
      }
      return $this->beansContainer() . " Espressos left";
    }

    /**
     * @param BeansContainer $container
     */
    public function setBeansContainer(BeansContainerInterface $container)
    {
      $this->beansContainer = $container;
    }

    /**
     * @return BeansContainer
     */

    public function getBeansContainer()
    {
      return $this->beansContainer;
    }

    /**
     * @param WaterContainer $container
     */

    public function setWaterContainer(WaterContainerInterface $container)
    {
      $this->waterContainer = $container;
    }

    /**
     * @return WaterContainer
     */

    public function getWaterContainer()
    {
      return $this->waterContainer;
    }

    public function addWater($litres)
    {
      if($this->waterContainer->getWater() + $litres > $this->waterContainer->getCapacity()) {
          throw new ContainerFullException();
      }
    }

    public function useWater($litres)
    {
      $this->waterContainer->useWater($litres);
    }

    public function getWater()
    {
      return $this->waterContainer->getWater();
    }

    public function addBeans($spoons)
    {
      if($this->waterContainer->getWater() < 0.05) {
        throw new NoWaterException();
      }
      $this->add($spoons);
      $this->spoonsAvailable + $spoons;
      return void;
    }

    public function useBeans($spoons)
    {
      $this->beansContainer->useBeans($spoons);
    }

    public function getBeans()
    {
      return $this->beansContainer->getBeans();
    }
}
