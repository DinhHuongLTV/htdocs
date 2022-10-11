<?php
// ! php fundamentals
// * debugging function: var_dump() 
// ? variable
// * Syntax: $<variable_name> = <value>
$fullname = `Dinh Huong`;
$myNumber = 123;
// * variable naming rules: just likes every programming languages
// ? date type
// * interger: -2^31 -> 2^31 - 1 
$age = 20;
var_dump($age); // => int(20) 
var_dump(is_int($age)); // => bool(true) 
// * float/double:
$number1 = 12.2;
var_dump($number1); // => float(12.2)

// * string: you can you all of these ('), ("), (`) to declare a tring. Use (.) to concat two strings or (") to use literal string
$myString1 = 'DinhHuong';
$myString2 = "LTV";
$myString3 = `hello`;
var_dump($myString1); // => string(9)"DinhHuong"
$stringConcat = $myString1 . ' Hello';
$stringConcat2 = "$myString1 Hello";
echo $stringConcat; // => DinhHuong Hello
echo '<br>';
echo $stringConcat2; // => DinhHuong Hello
// * boolean: php does not distingushes capitalization between <true> and <false> and so does <null>
$check1 = true;
$check2 = false;

var_dump($check1);
// -> integer, float, double, string, boolean are ancient data types;
// null: happends when you call a variable that does not exist
$checkNull = Null;
var_dump($checkNull);

// array: 
// object: 

// ! data type conversion
$myInt = 12.23; // float 
$test1 = (int)$myInt;
var_dump($test1); // => int(12)

$test2 = (string)$myInt;
var_dump($test2); // => string(5) "12.23"

$test3 = (bool)$myInt;
var_dump($test3); // => bool(true)

// * const
// way1: const PI = 3.14;
// way2: define('PI', 3.14);
// var_dump(PI); => // float(3.14)

// !built-in functions: in examples below, to show up correct output you must command all of the codes below the current test
echo '<br>';
echo __LINE__; // 59 

echo '<br>';
echo __FILE__; // C:\xampp\htdocs\php_test\php_basic.php

echo '<br>';
echo __DIR__; // C:\xampp\htdocs\php_test\
