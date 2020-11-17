<?php

declare(strict_types=1);

abstract class AbstractHandler implements IHandler
{
    /**
     * Объект для работы с платежнеой системы
     *
     * @var object
     */
    protected $sdk;

    public function __construct(object $sdk)
    {
        $this->sdk = $sdk;
    }
}