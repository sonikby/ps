<?php

declare(strict_types=1);

class StripeProcessor extends AbstractPaymentProcessor
{

    const PAYMENT_NAME = 'Stripe';

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