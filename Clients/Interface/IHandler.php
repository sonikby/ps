<?php

declare(strict_types=1);

interface IHandler extends IFormatter
{
    public function execute(IRequest $request): ?string;
    public function isOperation(): bool;
}