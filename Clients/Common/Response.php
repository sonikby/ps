<?php

declare(strict_types=1);

class Response implements IResponse
{

    public function isError(): bool
    {
        // TODO: Implement isError() method.
    }

    public function errors(): ?array
    {
        // TODO: Implement errors() method.
    }

    public function getResponse(): array
    {
        // TODO: Implement response() method.
    }

    public function getTransaction(): IOuterTransaction
    {
        // TODO: Implement getTransaction() method.
    }

    public function setResponse(array $arr): void
    {
        // TODO: Implement setResponse() method.
    }

    public function setError(array $arr): void
    {
        // TODO: Implement setError() method.
    }

    public function setTransaction(IOuterTransaction $transaction): void
    {
        // TODO: Implement setTransaction() method.
    }
}