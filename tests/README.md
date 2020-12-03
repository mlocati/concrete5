## Step 1: Clone this repository.

Or download it.


## Step 2: Setup concrete5

As described [here](../README.md#installation)


## Step 3: Setup the database

The test system expects to have access to a MySQL installation on the same computer where the tests will be executed.
The tests needs to have administration rights on MySQL in order to create and drop the test database and the tables inside it.
You need to create a MySQL account with login `concrete5_tester` and password `12345`, and give it administration rights:

```sql
CREATE USER 'concrete5_tester'@'localhost' IDENTIFIED BY '12345';
GRANT ALL PRIVILEGES ON *.* TO 'concrete5_tester'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```


## Step 4: Run the tests!

Run

	composer test

from within the root directory (not the tests folder).

Expected output is something like

	PHPUnit 4.8.35 by Sebastian Bergmann and contributors.

	.............................................................   61 / 1366 (  4%)
	.............................................................  122 / 1366 (  8%)
	.............................................................  183 / 1366 ( 13%)
	.............................................................  244 / 1366 ( 17%)
	.............................................................  305 / 1366 ( 22%)
	.............................................................  366 / 1366 ( 26%)
	.............................................................  427 / 1366 ( 31%)
	.............................................................  488 / 1366 ( 35%)
	.............................................................  549 / 1366 ( 40%)
	................SSSSSS.......................................  610 / 1366 ( 44%)
	.............................................................  671 / 1366 ( 49%)
	.............................................................  732 / 1366 ( 53%)
	.............................................................  793 / 1366 ( 58%)
	.............................................................  854 / 1366 ( 62%)
	.............................................................  915 / 1366 ( 66%)
	...............................................IIII..........  976 / 1366 ( 71%)
	............................................................. 1037 / 1366 ( 75%)
	.II.......................................................... 1098 / 1366 ( 80%)
	............................................................. 1159 / 1366 ( 84%)
	............................................................. 1220 / 1366 ( 89%)
	............................................................. 1281 / 1366 ( 93%)
	............................................................. 1342 / 1366 ( 98%)
	........................

	Time: 1.65 minutes, Memory: 106.00MB

	OK, but incomplete, skipped, or risky tests!
	Tests: 1366, Assertions: 3413, Skipped: 6, Incomplete: 6.


To run a single tests, you can run for example
```bash
composer test -- --filter testCoreBlockView
```

# Write Tests!

Send us tests via pull request:
- actual test classes must go to the /tests/tests folder (classes must be defined in a namespace starting with Concrete\Tests\...)
- helper classes must go to the /tests/helpers folder (classes must be defined in a namespace starting with Concrete\TestHelpers\...)
- other files must go to the /tests/assets folder (images, fake classes, ...)
