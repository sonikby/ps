<?php

declare(strict_types=1);

class StripeProcessor extends AbstractPaymentProcessor
{

    const PAYMENT_NAME = 'Stripe';

    public function getPaymentSystem(): string
    {
        return self::PAYMENT_NAME;
    }

    /**
     * More ditails doc: https://github.com/stripe/stripe-php
     *
     * @return object
     */
    public function getSdk(): object
    {
       return new \Stripe\StripeClient('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
    }
}