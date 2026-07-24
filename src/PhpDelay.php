<?php

namespace PhpUtils;

final class PhpDelay
{
    private static ?self $instance = null;

    /** @var callable[] */
    private array $tasks = [];

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \RuntimeException("Cannot unserialize singleton.");
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

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
