<?php

namespace Bigpoint\Assessment;

use InvalidArgumentException;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;
use UnderflowException;

class InventoryTest extends TestCase
{
    public function testAddItem()
    {
        $inventory = new Inventory();
        $inventory->addItem(1, 12);
        $this->assertEquals(12, $inventory->getStock(1));
        $inventory->addItem(1, 5);
        $this->assertEquals(17, $inventory->getStock(1));
    }

    public function testRemoveItem()
    {
        $inventory = new Inventory();
        $inventory->addItem(1, 10);
        $inventory->removeItem(1, 4);
        $this->assertEquals(6, $inventory->getStock(1));
        $inventory->removeItem(1, 6);
        $this->assertEquals(0, $inventory->getStock(1));
    }

    public function testGetStock()
    {
        $inventory = new Inventory();
        $inventory->addItem(1, 40);
        $this->assertEquals(40, $inventory->getStock(1));
        $this->assertEquals(0, $inventory->getStock(2));
    }

    public function testAddItemWithNegativeAmount()
    {
        $this->expectException(InvalidArgumentException::class);
        $inventory = new Inventory();
        $inventory->addItem(1, -5);
    }

    public function testRemoveItemNotInStock()
    {
        $this->expectException(OutOfBoundsException::class);
        $inventory = new Inventory();
        $inventory->removeItem(1, 5);
    }

    public function testRemoveItemMoreThanInStock()
    {
        $this->expectException(UnderflowException::class);
        $inventory = new Inventory();
        $inventory->addItem(1, 5);
        $inventory->removeItem(1, 10);
    }

    public function testMaxStockStack()
    {

        $inventory = new Inventory();
        $inventory->addItem(1, 9);
        $inventory->addItem(1, 10);
        $this->expectException(\OverflowException::class);
    }
}
