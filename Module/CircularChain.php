<?php

namespace Module;


class CircularChain
{
    public Node $head;

    // counts
    public int $repeatingCount;
    public int $totalCount;
    public int $soleCount;

    // arrays
    public array $repeating;
    public array $soles;

    public function __construct(int $depth)
    {
        $this->repeatingCount = 0;
        $this->totalCount = 0;
        $this->soleCount = 0;
        $this->repeating = [];
        $this->soles = [];
        $this->createDataStructure($depth);
    }

    private function createDataStructure(int $depth): void
    {
        $this->head = new Node(0);
        $current = $this->head;
        for ($i = 0; $i < $depth; $i++) {
            $newNode = new Node($i + 1);
            $current->next = $newNode;
            $current = $newNode;
        }
        $current->next = $this->head;
    }

    public function handle(array $phones): void
    {
        foreach ($phones as $phone) {
            $extended = false;
            foreach (str_split($phone) as $number) {
                if ($this->head->numbers[$number] == 0) {
                    $extended = true;
                    $this->head->numbers[$number] = 1;
                }
                $this->head = $this->head->next;
            }

            // ...
            $this->totalCount++;
            if ($extended) {
                $this->soleCount++;
                $this->soles[] = $phone;
                continue;
            }
            $this->repeatingCount++;
            $this->repeating[] = $phone;
        }
    }
}