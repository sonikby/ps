<?php

declare(strict_types=1);

class CreateTransaction extends AbstractCommand
{
    public const OPERATION_NAME = 'CreateTransaction';

    public function execute(InnerTransactionEntity $transaction): ?IResponse
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
        if ($handler->isExecute() === false) {
            return null;
        }
        $hydrator = $this->paymentProcessor->hydrator();
        $formatter = $this->paymentProcessor->formatter();
        /**
         * Преобразуем транзакцию в объект DataTransfer
         */
        $dataTransfer = $hydrator->extract($transaction);
        /**
         * Форматируем
         */
        $dataTransfer = $formatter->encode($dataTransfer);
        /**
         * Создаем объект Request
         */
        $request = new Request($transaction, $dataTransfer);
        /**
         * Выполняем операцию
         */
        $response = $handler->execute($request);
        /**
         * Декодируем
         */
        $response = $formatter->decode($response);
        return $hydrator->hydrate($response);
    }
}