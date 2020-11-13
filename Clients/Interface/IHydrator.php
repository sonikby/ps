<?php

declare(strict_types=1);

interface IHydrator
{
    public function extract(InnerTransactionEntity $obj): IOutput;
    public function revert(IInput $input): IResponse;
}