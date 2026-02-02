<?php
// ==========================================
// 03 - Prime Seeker
// ==========================================
echo "03 - Prime Seeker\n";
echo "-------------------\n";

function isPrime(int $n): bool {
    if ($n < 2) {
        return false;
    }
    if ($n === 2) {
        return true;
    }
    if ($n % 2 === 0) {
        return false;
    }
    
    for ($i = 3; $i * $i <= $n; $i += 2) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

$primes = [];

for ($i = 1; $i <= 100; $i++) {
    if (isPrime($i)) {
        $primes[] = $i;
    }
}

echo "Output: " . implode(", ", $primes) . "\n\n";

?>