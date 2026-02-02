<?php
// ==========================================
// 02 - Student List
// ==========================================
echo "02 - Student List\n";
echo "-------------------\n";

$students = [
    ['name' => 'Alice', 'grade' => 90],
    ['name' => 'Bob', 'grade' => 85],
    ['name' => 'Charlie', 'grade' => 92],
    ['name' => 'Diana', 'grade' => 88]
];

echo "Output: HTML Table\n";
echo "<table border='1'>\n";
echo "  <tr>\n";
echo "    <th>Name</th>\n";
echo "    <th>Grade</th>\n";
echo "  </tr>\n";

foreach ($students as $student) {
    echo "  <tr>\n";
    echo "    <td>" . htmlspecialchars($student['name']) . "</td>\n";
    echo "    <td>" . $student['grade'] . "</td>\n";
    echo "  </tr>\n";
}

echo "</table>\n\n";


?>