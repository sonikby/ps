<?php

declare(strict_types=1);

interface IHandler
{
    /**
     * Выполнить команду платежной системы
     * @param  IRequest  $request
     * @return IData|null
     */
    public function execute(IRequest $request): ?IData;

    /**
     * Может ли быть выполнена команда для этой платежной системы
     * @return bool
     */
    public function isExecute(): bool;
}