<?php
// ==========================================
// 02 - Day Planner
// ==========================================
echo "02 - Day Planner\n";
echo "-------------------\n";

$dayNum = 3;
$dayName = "";

switch ($dayNum) {
    case 1:
        $dayName = "Monday";
        break;
    case 2:
        $dayName = "Tuesday";
        break;
    case 3:
        $dayName = "Wednesday";
        break;
    case 4:
        $dayName = "Thursday";
        break;
    case 5:
        $dayName = "Friday";
        break;
    case 6:
        $dayName = "Saturday";
        break;
    case 7:
        $dayName = "Sunday";
        break;
    default:
        $dayName = "Invalid";
}

echo "Input: " . $dayNum . "\n";
?>