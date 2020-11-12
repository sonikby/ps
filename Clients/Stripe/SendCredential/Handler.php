<?php

declare(strict_types=1);

class Handler extends AbstractHandler
{

    public function execute(IRequest $request): ?string
    {
        return $this->sdk->send('create', $request->getRequest());
    }

    public function isOperation(): bool
    {
        return true;
    }
}