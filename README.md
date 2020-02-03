[![Build Status](https://travis-ci.org/vdebes/kata-roman-numerals.svg?branch=master)](https://travis-ci.org/vdebes/kata-roman-numerals)
[![Test Coverage](https://api.codeclimate.com/v1/badges/d3212371239a59fae1e4/test_coverage)](https://codeclimate.com/github/vdebes/kata-roman-numerals/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/d3212371239a59fae1e4/maintainability)](https://codeclimate.com/github/vdebes/kata-roman-numerals/maintainability)  

# kata-roman-numerals
Arabic to Roman numeral converter [code kata](http://codingdojo.org/kata/RomanNumerals/).
This is _supposed to be_ a medium difficulty problem.

## Performed as a randori
### Timeline
* 5min : briefing
* 5min : subject and resources reading
* 60min : coding
* 10min : debriefing / ROTI
### Rules
* **Iterate using TDD**
* Programming is done in pairs with navigator (defines the implementation) and driver (writes the code only)
* Each participant is navigator for 5min, at least one time.
* After 5min the navigator becomes driver and a new navigator steps in.
* At any point in time a navigator can decide to refactor.

#### Randori rules
1. if you are the navigator, you get to decide what to type
2. if you are the navigator and you don’t know what to
type, ask for help
3. if you are asked for help, kindly respond to the best of
your ability
4. if you are not asked, but you see an opportunity for
improvement or learning, choose an appropriate mo-
ment to mention it. This may involve waiting until the
next time all the tests pass (for design improvement
suggestions) or until the retrospective.

_Adapted to pair programming from [The Coding Dojo Handbook](https://leanpub.com/codingdojohandbook) by Emily Bache_

### Goal
The goal is not to finish the kata but to improve communication between developers, learn from each other, and __have fun__!
A green test at the end of each round and at the end of the dojo remains a must have.

## Part 1
Iterate to convert integers from 1 to 3999 to Roman numeral strings.

## Part 2
Iterate to do the reverse operation : convert Roman numeral strings to integers. 

## Useful resources
* [Wikipedia](https://en.wikipedia.org/wiki/Roman_numerals)
* [List of conversions from 1 to 3999](tests/roman.csv)
* [The Coding Dojo Handbook](https://leanpub.com/codingdojohandbook) by Emily Bache

## Included tools
* ```make cs-fix``` [PHP-CS-Fixe](https://github.com/FriendsOfPHP/PHP-CS-Fixer) fixes the code style as the name implies.
* ```make static``` [PHPstan](https://github.com/phpstan/phpstan) is a static code analyzer. Usefull anytime but especially when refactoring. 
* ```make unit``` [PHPUnit](https://github.com/sebastianbergmann/phpunit/) is a unit test library. You need it to practice TDD. 

A first green test is included as a starting point for you to iterate.
