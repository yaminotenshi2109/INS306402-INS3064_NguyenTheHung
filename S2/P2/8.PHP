<?php
// ==========================================
// 08 - FizzBuzz
// ==========================================
echo "08 - FizzBuzz\n";
echo "-------------------\n";

$fizzbuzzOutput = "";

for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        $fizzbuzzOutput .= "FizzBuzz";
    } elseif ($i % 3 == 0) {
        $fizzbuzzOutput .= "Fizz";
    } elseif ($i % 5 == 0) {
        $fizzbuzzOutput .= "Buzz";
    } else {
        $fizzbuzzOutput .= $i;
    }
    
    if ($i < 50) {
        $fizzbuzzOutput .= ", ";
    }
}

echo "Output: " . $fizzbuzzOutput . "\n";
?>