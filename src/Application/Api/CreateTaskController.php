<?php

namespace App\ToDo\Application\Api;

use App\ToDo\Application\Presenters\CreateTask\ICreateTaskPresenter;
use App\ToDo\Application\Protocols\Http\Controller;
use App\ToDo\Application\UseCases\CreateTask\InputCreateTask;
use App\ToDo\Domain\Exceptions\MissingParamsError;
use App\ToDo\Domain\UseCases\CreateTask\ICreateTaskUseCase;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CreateTaskController implements Controller
{
    private ICreateTaskUseCase $service;
    private ICreateTaskPresenter $presenter;

    public function __construct(ICreateTaskUseCase $service, ICreateTaskPresenter $presenter)
    {
        $this->service = $service;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        if (!$data) {
            throw new MissingParamsError();
        }
        $inputCreateTask = InputCreateTask::create($data);
        $outputCreateTask = $this->service->execute($inputCreateTask);

        $response->getBody()->write($this->presenter->toJson($outputCreateTask));
        return $response;
    }
}
