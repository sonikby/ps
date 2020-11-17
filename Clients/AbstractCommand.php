<?php

declare(strict_types=1);

abstract class AbstractCommand
{
    /**
     * @var IPaymentProcessor
     */
    protected $paymentProcessor;

    public function __construct(IPaymentProcessor $paymentProcessor)
    {
        $this->paymentProcessor = $paymentProcessor;
    }

    abstract public function execute(InnerTransactionEntity $transaction): ?IResponse;
}