<?php

declare(strict_types=1);

interface IData
{
    public function isArray(): bool;
    public function isObject(): bool;
    public function isString(): bool;
    public function getArray(): ?array;
    public function getObject();
    public function getString(): ?string;
}