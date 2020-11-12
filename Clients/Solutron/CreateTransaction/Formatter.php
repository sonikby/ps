<?php

declare(strict_types=1);

class Formatter implements IFormatter
{
    public function encode(array $arr): string
    {
        return json_encode($arr);
    }

    public function decode(string $str): array
    {
        return json_decode($str, true);
    }
}