<?php

namespace Tools;

class PhpDelay
{

    /** @var callable[] */
    private array $tasks = [];

    public function push(callable $closure): self
    {
        $this->tasks[] = $closure;
        return $this;
    }

    public function __destruct()
    {
        foreach ($this->tasks as $task) {
            $task();
        }
    }
}
