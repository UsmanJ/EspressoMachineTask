<?php
namespace MyBuilder\CodeTest;

use MyBuilder\CodeTest\Container\ContainerFullException;
use MyBuilder\CodeTest\Container\EspressoMachineContainerException;

class Container
{
    public $amount;
    public $capacity;

    public function __construct($capacity) {
        $this->capacity = $capacity;
        $this->amount = 0;
    }
    public function addToContainer($amount) {
        if($this->amount + $amount > $this->capacity) {
        }
        $this->amount+=$amount;
    }
    public function takeFromContainer($amount) {
        if($this->amount - $amount < 0) {
        }
        $this->amount -= $amount;
    }
    public function getFromContainer() {
        return $this->amount;
    }
    public function getCapacity() {
        return $this->capacity;
    }
}
