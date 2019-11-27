<?php declare(strict_types=1);

namespace App;

class SingleImplementationFactory
{
    public function create(): SinglyImplementedInterface
    {
        var_dump('Dump with following die inside factory - execution should reach here and stop.'); die;
        return new SingleImplementation();
    }
}