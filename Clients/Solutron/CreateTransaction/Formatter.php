<?php

declare(strict_types=1);

class Formatter implements IFormatter
{
    public function encode(IData $data): IData
    {
        if ($data->isArray() === false) {
            /**
             * @todo Exception typeof
             */
        }
        $data->setString(json_encode($data->getArray()));
        return $data;
    }

    public function decode(IData $data): IData
    {
        if ($data->isString() === false) {
            /**
             * @todo Exception typeof
             */
        }
        $data->setString(json_decode($data->getString()));
        return $data;
    }
}