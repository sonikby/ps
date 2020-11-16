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
        /***
         * @todo Заполнениие IOuterTransaction
         */
        return $response;
    }

    public function revert(array $arr): IResponse
    {
        $response = new Response();
        if ($arr['body']['errors']) {
            $response->setError($arr['body']['errors']);
            return $response;
        }
        /**
         * TODO Заполняем то что требуется
         */
    }

    public function extract(InnerTransactionEntity $obj): IData
    {
        $array = ['amount' => $obj->amount()];
        $dataTransfer = new DataTransfer();
        $dataTransfer->setArray($array);
        return $dataTransfer;
    }
}