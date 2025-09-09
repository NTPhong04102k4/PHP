<?php

echo "=== BÀI 8: ĐẾM SỐ ÂM/DƯƠNG TRONG MẢNG ===\n\n";

$array = [-5, 3, -2, 8, -1, 0, 4, -7, 9, -3];

echo "Mảng: " . implode(', ', $array) . "\n\n";

$positive = 0;
$negative = 0;
$zero = 0;

foreach ($array as $value) {
    if ($value > 0) {
        $positive++;
    } elseif ($value < 0) {
        $negative++;
    } else {
        $zero++;
    }
}

echo "Kết quả:\n";
echo "Số dương: $positive\n";
echo "Số âm: $negative\n";
echo "Số 0: $zero\n";

?>
