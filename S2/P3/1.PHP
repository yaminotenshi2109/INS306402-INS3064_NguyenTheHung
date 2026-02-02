<?php
// ==========================================
// 01 - Greeter
// ==========================================
echo "01 - Greeter\n";
echo "-------------------\n";

function greet(string $name): string {
    return "Hello, " . $name;
}

$input1 = greet("Sam");
echo "Input: greet(\"Sam\");\n";
echo "Output: \"" . $input1 . "\"\n\n";

?>