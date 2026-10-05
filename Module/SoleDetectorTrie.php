<?php

namespace Module;

class SoleDetectorTrie
{
    private array $root = [];

    public int $repeatingCount = 0;
    public int $totalCount = 0;
    public int $soleCount = 0;

    public array $repeating = [];
    public array $soles = [];

    public function __construct(array $values)
    {
        $this->insert($values);
    }

    private function insert(array $values): void
    {
        $values = array_map('strval', $values);
        $length = $values ? max(array_map('strlen', $values)) : 0;

        foreach ($values as $original) {
            // Restore lost leading zeros so all values have the same length
            $value = str_pad($original, $length, '0', STR_PAD_LEFT);

            $node = &$this->root;
            foreach (str_split($value) as $digit) {
                $node[$digit] ??= [];
                $node = &$node[$digit];
            }

            $isNew = ! isset($node['end']);
            $node['end'] = true;
            unset($node); // break the reference

            $this->totalCount++;

            if ($isNew) {
                $this->soleCount++;
                $this->soles[] = $original;
            } else {
                $this->repeatingCount++;
                $this->repeating[] = $original;
            }
        }
    }
}