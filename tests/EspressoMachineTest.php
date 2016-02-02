<?php

namespace MyBuilder\Tests;

use MyBuilder\CodeTest\EspressoMachine;
use MyBuilder\CodeTest\WaterContainer;
use MyBuilder\CodeTest\BeansContainer;
use MyBuilder\CodeTest\Container\ContainerFullException;
use MyBuilder\CodeTest\Container\EspressoMachineException;
use MyBuilder\Tests\PHPUnit_Framework_TestCase;

class EspressoMachineTest extends \PHPUnit_Framework_TestCase
{


  public function initializeCoffee() {
    $waterContainer = new WaterContainer(1);
    $beansContainer = new BeansContainer(50);
    $this->coffee = new EspressoMachine($waterContainer, $beansContainer);
  }

  public function testUseWater() {
    $this->initializeCoffee();
    $this->coffee->useWater(0.1);
    $this->assertEquals(0.9, $this->coffee->getWater());
  }

  public function testUseBeans() {
    $this->initializeCoffee();
    $this->coffee->useBeans(2);
    $this->assertEquals(48, $this->coffee->getBeans());
  }


    public function testAddingWater() {
      $this->initializeCoffee();
      $this->coffee->useWater(0.5);
      $this->coffee->addWater(0.5);
      $this->assertEquals(1, $this->coffee>getWater());
    }

    public function testAddingBeans() {
      $this->initializeCoffee();
      $this->coffee->useBeans(10);
      $this->coffee->addBeans(5);
      $this->assertEquals(45, $this->coffee>getBeans());
    }
}
