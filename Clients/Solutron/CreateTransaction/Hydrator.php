<?php

declare(strict_types=1);

class Hydrator implements IHydrator
{

    public function hydrate(InnerTransactionEntity $obj): array
    {
        return ['amount' => $obj->amount()];
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
}