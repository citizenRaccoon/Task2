# Test task.

## Problem 1:

### Description

Write a function that accepts a string as input and returns a boolean as output. The function should determine if all parenthetical characters in the string—(, ), [, ], {, }—are balanced, that is, for each opening parenthesis, there is a corresponding closing parenthesis of the same form, and in the reversed sequence as they were opened. Parentheses may be nested.

> This is balanced: mary (had a [little] lamb)

> This is unbalanced: mary (had a [little) lamb]

### Solution

**Script:** brackets_balance_check.php

**Requirements:** PHP 8+; 'classes' folder must be alongside this script

**Usage:**

1) Using by writing array down command line. Argument is a text you want to check. Text must be enclosed with quotes.

```bash
php brackets_balance_check.php "This thing (is {most} ridiculous) I've ever seen."
```

2) Using with input from file. First argument is **-f**. Second argument is path to a text file with a text.

```bash
php brackets_balance_check.php -f resources/brackets_balance_check.txt
```

**Output example:**

```
This is balanced: This thing (is {most} ridiculous) I've ever seen.
```
```
This is unbalanced: This thing (is {most} ridiculous) I've ever seen).
```

## Problem 2:

### Description

Write a function that accepts two arguments, an array of numbers and a single integer, and returns an array similar to the first argument, but with all the values multiplied by the integer. The input array may be nested arbitrarily deeply. For example:

> input: [1, 2, [10, [100, 200], 20, 30], 3, [40, 50]], 2

> output: [2, 4, [20, [200, 400], 40, 60], 6, [80, 100]]

### Solution

**Script:** array_multiply.php

**Requirements:** PHP 8+

**Usage:**

1) Using by writing array down command line
- First argument is array. Numbers' delimeter is comma (,); each array level must be taken in square brackets, including the first one (e.g *[2, 5, [3, 2]]*). This argument must be enclosed with quotes. **Any symbols others than numbers, comma or square brackets will be ignored.**
- Second argument is multiplier. It can be only a number.

```bash
php array_multiplier.php "[12, [176, 593], 24, 53, [15, [1245, 6345, 63546, [6546, 643653, 43534]], 14], 18]" 2
```

2) Using with input from file
- First argument is **-f**
- Second argument is path to a text file with an array (e.g. *resources/file.txt*, */home/user/file.txt*). Numbers' delimeter is comma (,); each array level must be taken in square brackets, including the first one (e.g *[2, 5, [3, 2]]*). This argument must be enclosed with quotes. **Any symbols others than numbers, comma or square brackets will be ignored.**
- Third argument is multiplier. It can be only a number.
```bash
php array_multiplier.php -f resources/multiply_check.txt 5
```

**Output example:**

```
[60, [880, 2965], 120, 265, [75, [6225, 31725, 317730, [32730, 3218265, 217670]], 70], 60]

```
