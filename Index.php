<?php

/**
 * Воображаемая точка входа
 */
declare(strict_types=1);

class Index
{

    /**
     * Пример с DTO Stripe
     */
    public function stripeIndex()
    {
        $transaction =  $this->db->execute('select * from transaction where invoce = 1');
        // DTO
        $innerTransaction = new InnerTransaction();
        $innerTransaction->setAmount($transaction->amount);
        $innerTransaction->setCurrency($transaction->currency);

        foreach ($transaction->getInvoce()->getProduct() as $item) {
            $product = new Product();
            $product->setId($item['id']);
            $productList[] = $product;
        }

        $innerTransaction->setProductList($productList);
        //todo validation
        $processor = new StripeProcessor();
        $command  = new CreateTransaction($processor);
        $response = $command->execute($innerTransaction);
        //todo обработка ответа
        $outputTransaction = $response->getTransaction();
        $transaction->hash = $outputTransaction->getHash();
        $this->db->save($transaction);
    }

    /**
     * Пример с DTO Solutron
     */
    public function solutronIndex()
    {
       $transaction =  $this->db->execute('select * from transaction where invoce = 1');
       // DTO
       $innerTransaction = new InnerTransaction();

       $innerTransaction->setAmount($transaction->amount);
       $innerTransaction->setCurrency($transaction->currency);

       foreach ($transaction->getInvoce()->getProduct() as $item) {
           $product = new Product();
           $product->setId($item['id']);
           $productList[] = $product;
       }

       $innerTransaction->setProductList($productList);
       $processor = new SolutronProcessor();
       $command  = new CreateTransaction($processor);

       //todo validation
       $response = $command->execute($innerTransaction);
       //todo обработка ответа
       $outputTransaction = $response->getTransaction();
       $transaction->hash = $outputTransaction->getHash();
       $this->db->save($transaction);
    }

    public function index2()
    {
        $transaction =  $this->db->execute('select * from transaction where invoce = 1');
        $processor = new SolutronProcessor();
        $command  = new CreateTransaction($processor);
        /**
         * validation
         */
        $response = $command->execute($transaction);
        /**
         * @todo
         */
        $outputTransaction = $response->getTransaction();
        $transaction->hash = $outputTransaction->getHash();
        $this->db->save($transaction);
    }

    public function index3()
    {
        $transaction =  $this->db->execute('select * from transaction where invoce = 1');
        $processor = new SolutronProcessor();
        $command  = new CreateTransaction($processor);
        $command->execute($transaction);
    }
}