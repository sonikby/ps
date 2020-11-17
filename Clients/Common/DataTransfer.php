<?php

/**
 * Проверка типов (см Hydrator)
 */
declare(strict_types=1);

class DataTransfer implements IData
{
    protected $data;

    public function isArray(): bool
    {
        return is_array($this->data);
    }

    public function isObject(): bool
    {
        return is_object($this->data);
    }

    public function isString(): bool
    {
        return is_string($this->data);
    }

    public function getArray(): ?array
    {
       if ($this->isArray() === false) {
           return null;
       }
       return $this->data;
    }

    public function getObject()
    {
        if ($this->isObject() === false) {
            return null;
        }
        return $this->data;
    }

    public function getString(): ?string
    {
        if ($this->isString() === false) {
            return null;
        }
        return $this->data;
    }

    public function setArray(array $arr): void
    {
        $this->data = $arr;
    }

    public function setObject($object): void
    {
       if (is_object($object) === false) {
           /*
            * todo Exception typeof
            */
           return;
       }
       $this->data = $object;
    }

    public function setString(string $string): void
    {
        $this->data = $string;
    }
}