<?php
// ==========================================
// 05 - Countdown
// ==========================================
echo "05 - Countdown\n";
echo "-------------------\n";

$countdown = "";
$i = 10;

while ($i >= 1) {
    $countdown .= $i . ", ";
    $i--;
}

$countdown .= "Liftoff!";

echo "Output: " . $countdown . "\n\n";

?>