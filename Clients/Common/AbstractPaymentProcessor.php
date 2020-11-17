<?php

declare(strict_types=1);

/**
 * Class AbstractPaymentProcessor
 * Пример процессора, но без DI
 */
abstract class AbstractPaymentProcessor implements IPaymentProcessor
{
    protected $path = 'App/Clients';
    protected $operation = '';
    const HYDRATOR_NAME = 'Hydrator';
    const FORMATTER_NAME = 'Formatter';
    const HANDLER_NAME = 'Handler';

    abstract public function getPaymentSystem(): string;

    abstract public function getSdk(): object;

    public function getPath(): string
    {
        return $this->path . '/' . $this->getPaymentSystem() . '/' . $this->operation;
    }

    public function hydrator(): IHydrator
    {
        $class = $this->getPath() . '/' . self::HYDRATOR_NAME;
        return new $class;
    }

    public function formatter(): IFormatter
    {
        $class = $this->getPath() . '/' . self::FORMATTER_NAME;
        return new $class;
    }

    public function handler(): IHandler
    {
        $class = $this->getPath() . '/' . self::HANDLER_NAME;
        return new $class;
    }

    public function registerOperation(string $operationName): void
    {
        $this->operation = $operationName;
    }
}