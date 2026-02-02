<?php
// ==========================================
// 02 - Area Calc
// ==========================================
echo "02 - Area Calc\n";
echo "-------------------\n";

function area(float $w, float $h): float {
    return $w * $h;
}

$input2 = area(5.5, 2);
echo "Input: area(5.5, 2);\n";
echo "Output: " . $input2 . "\n\n";


?>