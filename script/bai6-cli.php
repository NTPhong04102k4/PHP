<?php

echo "=== BÀI 6: TÍNH GIAI THỪA ===\n\n";

function factorial($n) {
    if ($n < 0) return -1;
    if ($n == 0 || $n == 1) return 1;
    
    return $n * factorial($n - 1);
}

$testNumbers = [0, 1, 5, 6, 10];

foreach ($testNumbers as $num) {
    $result = factorial($num);
    echo "$num! = $result\n";
}

echo "\nKết quả:\n";
echo "Công thức: n! = n × (n-1)!\n";
echo "Điều kiện: 0! = 1, 1! = 1\n";

?>
