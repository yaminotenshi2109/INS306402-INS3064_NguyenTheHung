<?php
// ==========================================
// 03 - Casting
// ==========================================
echo "03 - Casting\n";
echo "-------------------\n";

$string = "25.50";
$float_cast = (float)$string;
$int_cast = (int)$float_cast;

echo "// Output: " . gettype($float_cast) . "(" . $float_cast . "), " . gettype($int_cast) . "(" . $int_cast . ")\n\n";

?>