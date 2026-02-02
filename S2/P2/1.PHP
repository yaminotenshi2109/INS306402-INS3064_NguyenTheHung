<?php
// ==========================================
// 01 - Grade Bot
// ==========================================
echo "01 - Grade Bot\n";
echo "-------------------\n";

$score = 85;

if ($score >= 90) {
    $grade = "A";
} elseif ($score >= 80) {
    $grade = "B";
} elseif ($score >= 70) {
    $grade = "C";
} else {
    $grade = "F";
}

echo "Input: " . $score . "\n";
echo "Output: \"Grade: " . $grade . "\"\n\n";

?>