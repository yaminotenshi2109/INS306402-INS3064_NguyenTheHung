<?php
// ==========================================
// 06 - Even Filter
// ==========================================
echo "06 - Even Filter\n";
echo "-------------------\n";

$evenNumbers = "";

for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        $evenNumbers .= $i . ", ";
    }
}

$evenNumbers = rtrim($evenNumbers, ", ");

echo "Output: " . $evenNumbers . "\n\n";

?>