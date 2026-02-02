<?php
// ==========================================
// 04 - Safe Divide
// ==========================================
echo "04 - Safe Divide\n";
echo "-------------------\n";

function safeDiv(float $a, float $b): ?float {
    if ($b == 0) {
        return null;
    }
    return $a / $b;
}

$input4 = safeDiv(10, 0);
echo "Input: safeDiv(10, 0);\n";
echo "Output: " . ($input4 === null ? "null" : $input4) . "\n\n";


?>