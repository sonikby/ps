<?php

declare(strict_types=1);

interface IHandler
{
    public function execute(IRequest $request): ?IData;
    public function isExecute(): bool;
}