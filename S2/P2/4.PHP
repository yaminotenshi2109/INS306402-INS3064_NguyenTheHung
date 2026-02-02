<?php
// ==========================================
// 04 - Cart Total
// ==========================================
echo "04 - Cart Total\n";
echo "-------------------\n";

$prices = [10, 20, 5];
$total = 0;

foreach ($prices as $price) {
    $total += $price;
}

echo "Input: [10, 20, 5]\n";
echo "Output: \"Total: " . $total . "\"\n\n";



?>