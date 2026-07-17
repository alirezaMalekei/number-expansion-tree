<?php

namespace Module;
class Node
{
    public array $numbers;
    public int $depth;

    public ?Node $next;

    public function __construct(int $depth)
    {
        $this->numbers = array_fill(0, 10, 0);
        $this->depth = $depth;
        $this->next = null;
    }
}