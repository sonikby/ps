<?php

interface IFormatter
{
    public function encode(IInput $input): IOutput;
    public function decode(IInput $input): IOutput;
}