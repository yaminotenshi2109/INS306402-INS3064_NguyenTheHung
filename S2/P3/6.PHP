<?php

// ==========================================
// 06 - Pure Math
// ==========================================
echo "06 - Pure Math\n";
echo "-------------------\n";

function add(int $a, int $b): int {
    return $a + $b;
}

echo "Pure function with no side effects.\n";
echo "Function: add(\$a, \$b)\n";
echo "Example: add(3, 5) = " . add(3, 5) . "\n";
echo "Example: add(10, 20) = " . add(10, 20) . "\n";
echo "Output: Sum of inputs\n";


?>