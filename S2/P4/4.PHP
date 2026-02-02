<?php
// ==========================================
// 04 - Scoreboard
// ==========================================
echo "04 - Scoreboard\n";
echo "-------------------\n";

$scores = [85, 92, 78, 88, 95, 82, 90];

// Calculate average
$average = array_sum($scores) / count($scores);

// Find max and min
$max = max($scores);
$min = min($scores);

// Filter scores above average
$aboveAverage = array_filter($scores, function($score) use ($average) {
    return $score > $average;
});

// Sort top performers
$topPerformers = array_values(array_filter($scores, function($score) use ($average) {
    return $score > $average;
}));
sort($topPerformers);
$topPerformers = array_reverse($topPerformers);

echo "Input: Array of scores\n";
echo "Scores: [" . implode(", ", $scores) . "]\n";
echo "Output: \"Avg: " . round($average, 0) . ", Top: [" . implode(", ", array_slice($topPerformers, 0, 3)) . "]\"\n\n";

?>