<?php

class ProcessData
{
    public function __construct(private readonly array $data)
    {
    }

    public function getHighestAmount(): array
    {
        return array_reduce($this->data, function ($highest, $item) {
            return ($highest === null || $item['amount'] > $highest['amount']) ? $item : $highest;
        });
    }

    public function getTotalAmount(): int
    {
        return array_reduce($this->data, fn($carry, $item) => $carry + $item['amount'], 0);
    }

    public function getSortedItems(): array
    {
        $sorted = $this->data;
        usort($sorted, fn($i, $x) => $i['amount'] <=> $x['amount']);

        return $sorted;
    }

    public function getFilteredItems(int $threshold): array
    {
        return array_filter($this->data, fn($item) => $item['amount'] > $threshold);
    }
}
