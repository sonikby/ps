<?php

declare(strict_types=1);

class CreateTransaction extends AbstractCommand
{
    const OPERATION_NAME = 'CreateTransaction';

    public function execute(InnerTransaction $transaction): ?IResponse
    {
        /**
         * После регистрации операции, все классы будут подргужаться из папки CreateTransaction,
         * либо будет срабатывать DI
         */
        $this->paymentProcessor->registerOperation(self::OPERATION_NAME);
        $handler = $this->paymentProcessor->handler();
        /**
         * Проверка на то, есть ли данная операция у ПС, либо ее нет
         */
        if ($handler->isOperation() === false) {
            return null;
        }
        $hydrator = $this->paymentProcessor->hydrator();
        $formatter = $this->paymentProcessor->formatter();
        /**
         * Преобразуем транзакцию в необходимый масссив
         */
        $arr = $hydrator->hydrate($transaction);
        /**
         * Форматируем строку в нужный тип
         */
        $str = $formatter->encode($arr);
        $request = new Request($transaction, $str);
        $response = $handler->execute($request);
        $response = $formatter->decode($response);
        return $hydrator->revert($response);
    }
}