<?php

declare(strict_types=1);

class SolutronProcessor extends AbstractPaymentProcessor
{

    const PAYMENT_NAME = 'Solutron';

    public function getPaymentSystem(): string
    {
        return self::PAYMENT_NAME;
    }

    public function getSdk(): object
    {
        /**
         *
         */
    }
}