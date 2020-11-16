<?php

declare(strict_types=1);

class Formatter implements IFormatter
{
    public function encode(IData $data): IData
    {
        // проверка типов, мы заведомо одидаем массив
        if ($data->isArray() === false) {
            /**
             * @todo Exception typeof
             */
        }

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