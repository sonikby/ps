<?php

declare(strict_types=1);

interface IHandler
{
    public function execute(IRequest $request): ?string;
    public function isOperation(): bool;
}