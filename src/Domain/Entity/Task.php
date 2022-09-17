<?php

namespace Anglesson\Task\Domain\Entity;

class Task
{
    public ?string $id;
    public string $description;
    public bool $finished;

    public function __construct()
    {
        $this->finished = false;
    }

    public function __serialize(): array
    {
        return [
            'id'            => $this->id ?? null,
            'description'   => $this->description,
            'finished'      => $this->finished
        ];
    }

    public function __unserialize(array $data)
    {
        $this->description  = $data['description'] ?? '';
        $this->finished     = $data['finished'] ?? false;
    }
}
