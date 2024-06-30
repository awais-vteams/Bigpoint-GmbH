<?php

require_once 'ProcessData.php';

$data = [
    ['id' => 0, 'name' => 'Test', 'amount' => 3,],
    ['id' => 1, 'name' => 'Test', 'amount' => 2,],
    ['id' => 2, 'name' => 'Test', 'amount' => 1,],
    ['id' => 3, 'name' => 'Test', 'amount' => 0,],
    ['id' => 4, 'name' => 'Test', 'amount' => 4,],
    ['id' => 5, 'name' => 'Test', 'amount' => 5,],
    ['id' => 6, 'name' => 'High', 'amount' => 9,],
    ['id' => 7, 'name' => 'Test', 'amount' => 7,],
    ['id' => 8, 'name' => 'Test', 'amount' => 8,],
    ['id' => 9, 'name' => 'Test', 'amount' => 6,],
];

$processor = new ProcessData($data);

$highestAmount = $processor->getHighestAmount();
$totalAmount = $processor->getTotalAmount();
$sortedItems = $processor->getSortedItems();
$filteredItems = $processor->getFilteredItems(4); // Assuming filtering items with amount >= 4

// Item with the highest amount
echo 'Item with the highest amount: '.$highestAmount['name'].PHP_EOL;

// Total amount of items
echo 'Total amount of items: '.$totalAmount.PHP_EOL;

// Items sorted by amount
echo 'Items sorted by amount: '.var_export(array_column($sortedItems, 'amount'), true).PHP_EOL;

// Items filtered by amount
echo 'Items filtered by amount: '.var_export(array_column($filteredItems, 'amount'), true).PHP_EOL;