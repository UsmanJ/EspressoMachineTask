<?php

namespace MyBuilder\CodeTest\Machine;

class NoWaterException extends EspressoMachineException
{
  public function noWaterErrorMessage() {
    $noWaterErrorMessage = "You must add water to continue";
    return $noWaterErrorMessage;
  }
}
