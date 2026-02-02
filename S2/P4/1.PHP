<?php
// ==========================================
// 01 - BMI Calculator
// ==========================================
echo "01 - BMI Calculator\n";
echo "-------------------\n";

function calculateBMI(float $kg, float $m): float {
    return $kg / ($m * $m);
}

function determineBMICategory(float $bmi): string {
    if ($bmi < 18.5) {
        return "Under";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        return "Normal";
    } else {
        return "Over";
    }
}

$weight = 70;
$height = 1.75;
$bmi = calculateBMI($weight, $height);
$category = determineBMICategory($bmi);

echo "Input: Weight = " . $weight . "kg, Height = " . $height . "m\n";
echo "Output: \"BMI: " . round($bmi, 1) . " (" . $category . ")\"\n\n";


?>