<?php

namespace MyBuilder\CodeTest\Machine;

class NoBeansException extends EspressoMachineException
{
  public function noBeansErrorMessage() {
    $noBeansErrorMessage = "You must add beans to continue";
    return $noBeansErrorMessage;
  }
}
