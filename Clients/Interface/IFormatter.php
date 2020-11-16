<?php

interface IFormatter
{
    public function encode(IData $input): IData;
    public function decode(IData $input): IData;
}