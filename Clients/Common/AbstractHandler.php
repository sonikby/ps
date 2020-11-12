<?php

declare(strict_types=1);

abstract class AbstractHandler implements IHandler
{
    protected $sdk;

    public function __construct(object $sdk)
    {
        $this->sdk = $sdk;
    }
}