<?php

echo "=== BÀI 5: KIỂM TRA SỐ HOÀN HẢO ===\n\n";

function isPerfectNumber($n) {
    if ($n <= 1) return false;
    
    $sum = 0;
    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) {
            $sum += $i;
        }
    }
    
    return $sum == $n;
}

$testNumbers = [6, 28, 496, 12, 8, 1];

foreach ($testNumbers as $num) {
    $result = isPerfectNumber($num);
    $status = $result ? "LÀ" : "KHÔNG PHẢI";
    echo "Số $num: $status số hoàn hảo\n";
}

echo "\nKết quả:\n";
echo "Số hoàn hảo: Tổng các ước số (trừ chính nó) = chính nó\n";

?>
