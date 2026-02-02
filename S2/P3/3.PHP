<?php
// ==========================================
// 03 - Adult Check
// ==========================================
echo "03 - Adult Check\n";
echo "-------------------\n";

function isAdult(?int $age): bool {
    if ($age === null) {
        return false;
    }
    return $age >= 18;
}

$input3 = isAdult(null);
echo "Input: isAdult(null);\n";
echo "Output: " . ($input3 ? "true" : "false") . "\n\n";



?>