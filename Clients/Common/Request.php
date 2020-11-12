<?php

declare(strict_types=1);

class Request implements IRequest
{
    protected $transaction;
    protected $request;

    public function __construct(InnerTransactionEntity $transaction, string $request)
    {
        $this->transaction = $transaction;
        $this->request = $request;
    }

    public function getTransaction(): InnerTransactionEntity
    {
        return $this->transaction;
    }

    public function getRequest(): string
    {
        return $this->request;
    }
}