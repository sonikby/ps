<?php

declare(strict_types=1);

interface IHydrator
{
    public function hydrate(InnerTransactionEntity $obj): array;
    public function revert(array $arr): IResponse;
}