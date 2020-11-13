<?php

declare(strict_types=1);

class PaymentBuilder
{
    protected $paymentProcessor;
    /**
    protected $createTransaction;
    protected $infoTransaction;
    protected $credential;
     */


    public function __controller(IPaymentProcessor $paymentProcessor)
    {
        $this->paymentProcessor = $paymentProcessor;
    }
    public function createTransaction(Invoice $invoce): EntityTransaction
    {

        $transaction =  $this->db->execute('select * from transaction where status ="process,started" invoce = '.$invoce);

        /**
         * У инвойса есть открытые транзакции?
         */
        if (!empty($transaction)) {
            /**
             * Нет - создание транзакции
             */
            $transaction = new EntityTransaction($invoce);
        } else {
            /**
             * Если у транзакции хэш?
             */
            if (!empty($transaction->hash())) {
                /**
                 * Да - запрос в платежную систему
                 */
                $transactionInfo = $this->infoTransaction($transaction);
                /**
                 * Совпадают ли статусы транзакции?
                 */
                if ($transactionInfo->equlsTo($transaction) === false) {
                    /**
                     * Нет - отправляем event
                     */
                    $transactionInfo->id = $transaction->id();
                    $this->sendEvent('changeStatusTransaction', $transactionInfo);
                    /**
                     * Создаем новую транзакцию
                     */
                    $transaction = new EntityTransaction($invoce);
                } else {
                    /**
                     * ВНЕШНЯЯ транзакция действительна?
                     */
                    if ($transactionInfo->isExpired() === true) {
                        /**
                         * Возвращаем действующую текущую транзакцию
                         */
                        return $transaction;
                    }
                }
            }
        }

        /**
         * Создаем внешнюю транзакцию
         */
        $command  = new CreateTransaction($this->paymentProcessor);
        $response = $command->execute($transaction);
        /**
         * @todo Обработка ошибок и т.д.
         */
        $outputTransaction = $response->getTransaction();
        /**
         * Сохраняем внешний хэш и остальную информацию
         */
        $transaction->hash = $outputTransaction->getHash();
        $this->db->save($transaction);
        return $transaction;
    }

    public function infoTransaction(EntityTransaction $transaction): ?IOuterTransaction
    {
        $command  = new InfoTransaction($this->paymentProcessor);
        $response = $command->execute($transaction);
        /**
         * @todo Обработка ошибок и т.д.
         */
        return $response->getTransaction();
    }

    public function credential(array $data, EntityTransaction $transaction)
    {
        /**
         *
         */
        if ($transaction->hash !== $outerTransaction->hash) {
            $transaction->hash = $outerTransaction->hash;
        }
    }
}