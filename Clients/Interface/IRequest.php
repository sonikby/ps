<?php

declare(strict_types=1);

interface IRequest
{
    public function getTransaction(): InnerTransactionEntity;
    public function getRequest(): IOutput;
}