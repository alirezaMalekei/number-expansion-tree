<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Module\CircularChain;

$phones = ['09138332910', '09135633375', '09138332910', '09138332910', '09135633375', '09121001010'];

$chain = new CircularChain(10);

$chain->handle($phones);

// Helper to draw a separator line
function separator(int $length = 50): void {
    echo str_repeat('—', $length) . PHP_EOL;
}

separator();
echo "📊 PHONE NUMBER ANALYSIS" . PHP_EOL;
separator();

// Use printf for aligned columns
printf("┃ %-18s ┃ %8d ┃\n", "Total entries", $chain->totalCount);
printf("┃ %-18s ┃ %8d ┃\n", "Repeating Entries", $chain->repeatingCount);
printf("┃ %-18s ┃ %8d ┃\n", "Sole Entries", $chain->soleCount);
separator();

// Duplicates list
if (!empty($chain->repeating)) {
    echo PHP_EOL . "🔁 REPEATING (showing each occurrence):" . PHP_EOL;
    foreach ($chain->repeating as $index => $number) {
        printf("  %2d. %s\n", $index + 1, $number);
    }
} else {
    echo PHP_EOL . "✅ No repeating found." . PHP_EOL;
}

// Uniques list
if (!empty($chain->soles)) {
    echo PHP_EOL . "⭐ Sole Entries (without no duplicates):" . PHP_EOL;
    foreach ($chain->soles as $index => $number) {
        printf("  %2d. %s\n", $index + 1, $number);
    }
} else {
    echo PHP_EOL . "ℹ️  No sole numbers." . PHP_EOL;
}

separator();