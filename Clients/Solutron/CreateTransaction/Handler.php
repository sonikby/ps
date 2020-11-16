<?php

declare(strict_types=1);

class Handler extends AbstractHandler
{

    public function execute(IRequest $request): ?IData
    {
        $data =  $this->sdk->run('create', $request->getRequest());
        $dataTransfer = new DataTransfer();
        $dataTransfer->setArray($data);
        return $dataTransfer;
    }

    public function isExecute(): bool
    {
        return false;
    }
}