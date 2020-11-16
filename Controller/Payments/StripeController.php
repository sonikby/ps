<?php

declare(strict_types=1);

class StripeController
{
    protected $paymentBuilder;

    public function __construct(StripeProcessor $paymentProcessor)
    {
        $this->paymentBuilder = new PaymentBuilder($paymentProcessor);

    }

    /**
     * payments/stripe/create-transaction
     */
    public function createTransaction(Invoice $invoice)
    {
        $transaction = $this->paymentBuilder->createTransaction($invoice);
        return $this->redirect($transaction->getRedirectUrl());
    }

}

