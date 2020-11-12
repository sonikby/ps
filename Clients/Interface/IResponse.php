<?php

declare(strict_types=1);

interface IResponse
{
    public function isError(): bool;
    public function errors(): ?array;
    public function getResponse(): array;
    public function getTransaction(): IOuterTransaction;
    public function setResponse(array $arr): void;
    public function setError(array $arr): void;
    public function setTransaction(IOuterTransaction $transaction): void;
}