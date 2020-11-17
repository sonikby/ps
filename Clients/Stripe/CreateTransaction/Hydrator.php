<?php

declare(strict_types=1);

class Hydrator implements IHydrator
{
    public function hydrate(IData $obj): Response
    {
        $response = new Response();

        if ($obj->isArray() === false) {
            /**
             * @todo Exception typeof
             */
        }
        $arr = $obj->getArray();

        if ($arr['body']['errors']) {
            $response->setError($arr['body']['errors']);
            return $response;
        }

        $response->setResponse($arr);

        /**
         * @todo Заполнениие IOuterTransaction
         */
        return $response;
    }

    public function extract(InnerTransactionEntity $obj): IData
    {
        $dataTransfer = new DataTransfer();
        $dataTransfer->setArray(
            [
                'amount' => $obj->amount(),
                'currency' => $obj->currency(),
                'payment_method_types' => ['card'],
            ]
        );
        return $dataTransfer;
    }
}