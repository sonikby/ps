<?php

declare(strict_types=1);

interface IHydrator
{
    public function extract(InnerTransactionEntity $obj): IData;
    public function hydrate(Idata $input): IResponse;
}