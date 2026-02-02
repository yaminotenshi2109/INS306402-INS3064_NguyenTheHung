<?php
// ==========================================
// 07 - Strict Check
// ==========================================
echo "07 - Strict Check\n";
echo "-------------------\n";

$integer = 5;
$string_five = "5";

$equal = ($integer == $string_five) ? "true" : "false";
$identical = ($integer === $string_five) ? "true" : "false";

echo "// Output: Equal (" . $equal . "), Identical (" . $identical . ")\n\n";

?>