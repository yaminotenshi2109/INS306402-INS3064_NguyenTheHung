<?php
// ==========================================
// 07 - Array Reverse
// ==========================================
echo "07 - Array Reverse\n";
echo "-------------------\n";

$numbers = [1, 2, 3];
$reversed = array_reverse($numbers);

echo "Input: [1, 2, 3]\n";
echo "Output: [" . implode(", ", $reversed) . "]\n\n";


?>