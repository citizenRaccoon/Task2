<?php

class Stack
{
    private array $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function push($data): void
    {
        array_unshift($this->stack, $data);
    }

    public function pop(): String|false
    {
        return empty($this->stack) ? false : array_shift($this->stack);
    }

    public function peek(): String|false
    {
        return empty($this->stack) ? false : $this->stack[0];
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }
}