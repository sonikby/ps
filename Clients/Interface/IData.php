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
    public function setArray(array $arr): void;
    public function setObject($object): void;
    public function setString(string $string): void;
}