<?php

declare(strict_types=1);

class Handler extends AbstractHandler
{

    public function execute(IRequest $request): IData
    {
        // inside $request->getRequest() must be sort of:
        /*[
            'amount' => 2000,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]*/
        return $this->sdk->paymentIntents->create($request->getRequest());
    }

    public function isExecute(): bool
    {
        return true;
    }
}