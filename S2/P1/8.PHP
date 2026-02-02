<?php
// ==========================================
// 08 - Logic Gate
// ==========================================
echo "08 - Logic Gate\n";
echo "-------------------\n";

$age = 20;
$hasTicket = true;

$input_08 = $age . ", " . ($hasTicket ? "true" : "false");
$result = ($age > 18 && $hasTicket) ? "Enter" : "Deny";

echo "$input = " . $input_08 . ";\n";
echo "// Output: \"" . $result . "\"\n";
?>