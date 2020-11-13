<?php

declare(strict_types=1);

class SolutronController
{
    protected $paymentBuilder;

    public function __construct(SolutronProcessor $paymentProcessor)
    {
        $this->paymentBuilder = new PaymentBuilder($paymentProcessor);
    }

    /**
     * payments/solutron/create-transaction
     */
    public function createTransaction(Invoice $invoice)
    {
        $transaction = $this->paymentBuilder->createTransaction($invoice);
        return $this->renderForm('solutron_credential', $transaction);
    }

    public function credential()
    {

    }
}
