<?php

echo "=== BÀI 4: NHẬP SỐ CHO ĐẾN KHI NHẬP 0 ===\n\n";

$numbers = [];
$count = 0;

while (true) {
    echo "Nhập số (0 để dừng): ";
    $input = trim(fgets(STDIN));
    $number = (int)$input;
    
    if ($number == 0) {
        echo "Đã nhập số 0. Dừng chương trình.\n";
        break;
    }
    
    $numbers[] = $number;
    $count++;
    echo "Đã nhập: $number (Tổng số đã nhập: $count)\n";
}

echo "\nKết quả:\n";
echo "Tổng số đã nhập: $count\n";
echo "Các số đã nhập: " . implode(', ', $numbers) . "\n";

?>
