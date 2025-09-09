<?php

echo "=== BÀI 7: LIỆT KÊ ƯỚC SỐ ===\n\n";

function findDivisors($n) {
    $divisors = [];
    
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) {
            $divisors[] = $i;
        }
    }
    
    return $divisors;
}

$testNumber = 12;
$divisors = findDivisors($testNumber);

echo "Ước số của $testNumber:\n";
echo implode(', ', $divisors) . "\n";

echo "\nKết quả:\n";
echo "Tổng số ước: " . count($divisors) . "\n";
echo "Ước số: Các số chia hết cho $testNumber\n";

?>
