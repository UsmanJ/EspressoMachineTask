<?php

namespace MyBuilder\CodeTest\Container;

/**
 * Exception to be throw when a container is full and cannot accept more of what it stores.
 */
class ContainerFullException extends EspressoMachineContainerException
{
  public function containerFullErrorMessage() {
    $containerFullErrorMessage = "Container is full";
    return $containerFullErrorMessage;
  }
}
