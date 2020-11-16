<?php

declare(strict_types=1);

class Request implements IRequest
{
    protected $transaction;
    protected $request;

    public function __construct(InnerTransactionEntity $transaction, IData $request)
    {
        $this->transaction = $transaction;
        $this->request = $request;
    }

    public function getTransaction(): InnerTransactionEntity
    {
        return $this->transaction;
    }

    public function getRequest(): IData
    {
        return $this->request;
    }
}