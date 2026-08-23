<?php

namespace Module;

class Trie
{
    public Node $head;

    public int $totalCount;

    public function __construct(array $values)
    {
        $this->totalCount = 0;
        $depth = strlen($values[0] ?? 1) - 1;
        $this->createDataStructure($depth);
        $this->insert($values);
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

    private function insert(array $values): void
    {
        foreach ($values as $value) {
            $extended = false;
            foreach (str_split($value) as $number) {
                if ($this->head->numbers[$number] == 0) {
                    $extended = true;
                    $this->head->numbers[$number] = 1;
                }
                $this->head = $this->head->next;
            }

            // ...
            $this->totalCount++;
        }
    }

    public function exists(string $value)
    {
        $extended = false;
        foreach (str_split($value) as $number) {
            if ($this->head->numbers[$number] == 0)
                $extended = true;
            $this->head = $this->head->next;
        }
        return $extended ? false : true;
    }
}
