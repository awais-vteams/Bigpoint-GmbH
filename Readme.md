## Task 1
Write an inventory class with three functions:

- addItem
- removeItem
- getStock

The two functions addItem and removeItem will take item data with id and amount. It should be possible to add/remove more than one item of the same type.
getStock should return the current amount of an item type.
Please also write unit tests for all three functions.

### Solution

task1 folder contains the `Inventory` class and Test cases. To run the test make sure `composer` install.

```
cd task1
composer install // or composer update
vendor/bin/phpunit src/InventoryTest.php
```

## Task 2
In the index.php file you will find some data that has to be processed in different ways. Write functions/class to achive the correct outputs as stated in the file.

### Solution

task2 folder updated the index.php file. Also added the `ProcessData` class.