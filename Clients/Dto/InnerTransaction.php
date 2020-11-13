<?php

declare(strict_types=1);

class InnerTransaction
{
    protected $hash;

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getProductList()
    {
        return $this->productList;
    }

    /**
     * @param mixed $productList
     */
    public function setProductList($productList): void
    {
        $this->productList = $productList;
    }
    protected $amount;
    protected $currency;
    protected $productList;


}