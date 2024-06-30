<?php

namespace Bigpoint\Assessment;

use InvalidArgumentException;
use OutOfBoundsException;
use UnderflowException;

class Inventory
{
    private array $items = [];

    private array $herbs = [
        1 => 10,
        5 => 5,
        8 => 9,
    ];

    public function addItem(int $id, int $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Amount must be positive");
        }

        if (($this->herbs[$id] ?? 0) >= ($this->getStock($id) + $amount)) {
            throw new \OverflowException("Amount must be less than or equal to " . $this->herbs[$id] ?? 0);
        }

        $this->items[$id] = ($this->items[$id] ?? 0) + $amount;
    }

    public function removeItem(int $id, int $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Amount must be positive");
        }

        if (! isset($this->items[$id])) {
            throw new OutOfBoundsException("Item not found");
        }

        if ($this->items[$id] < $amount) {
            throw new UnderflowException("Not enough items in stock");
        }

        $this->items[$id] -= $amount;

        if ($this->items[$id] === 0) {
            unset($this->items[$id]);
        }
    }

    public function getStock(int $id): int
    {
        return $this->items[$id] ?? 0;
    }
}