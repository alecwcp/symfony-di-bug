<?php declare(strict_types=1);

namespace App;

class PublicService
{
    private $singlyImplemented;

    public function __construct(SinglyImplementedInterface $singlyImplemented)
    {
        $this->singlyImplemented = $singlyImplemented;
    }

    public function getSinglyImplemented(): SinglyImplementedInterface
    {
        return $this->singlyImplemented;
    }
}
