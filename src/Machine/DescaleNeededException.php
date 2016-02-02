<?php

namespace MyBuilder\CodeTest\Machine;

class DescaleNeededException extends EspressoMachineException
{
  public function descaleNeededErrorMessage() {
    $descaleNeededErrorMessage = "You must descale the machine to continue";
    return $descaleNeededErrorMessage;
  }
}
