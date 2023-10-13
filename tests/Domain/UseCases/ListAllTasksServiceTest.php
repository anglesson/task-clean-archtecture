<?php

namespace Test\Domain\UseCases;

use App\ToDo\Application\UseCases\ListAllTasks\IListAllTasksUseCaseImpl;
use App\ToDo\Domain\Entity\Task;
use App\ToDo\Domain\Protocols\ITaskRepository;
use App\ToDo\Domain\UseCases\ListAllTasks\IListAllTasksUseCase;
use App\ToDo\Domain\Utils\Validators\IValidation;
use PHPUnit\Framework\TestCase;

class ListAllTasksServiceTest extends TestCase
{
    public ITaskRepository $mockRepository;
    public IValidation $mockValidation;
    private IListAllTasksUseCase $sut;

    protected function setUp(): void
    {
        $this->mockRepository = $this->createMock(ITaskRepository::class);
        $this->sut = new IListAllTasksUseCaseImpl($this->mockRepository);
    }

    public function testShouldListAllTasks()
    {
        $repository = $this->createStub(ITaskRepository::class);

        $this->mockRepository
            ->method('list')
            ->willReturn([
                $this->createMock(Task::class),
                $this->createMock(Task::class),
                $this->createMock(Task::class),
            ]);

        $tasks = $this->sut->execute();
        $this->assertIsArray($tasks);
        $this->assertCount(3, $tasks);
    }
}
