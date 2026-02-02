<?php
// ==========================================
// 05 - Formatter
// ==========================================
echo "05 - Formatter\n";
echo "-------------------\n";

function fmt(float $amt, string $c = '$'): string {
    return $c . number_format($amt, 2);
}

$input5 = fmt(50);
echo "Input: fmt(50);\n";
echo "Output: \"" . $input5 . "\"\n\n";


?>