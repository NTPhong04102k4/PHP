<?php

$n_default = 6;
$epsilon = 1 / $n_default;

echo "n = $n_default, epsilon = $epsilon\n\n";

$sum = 0;
$n = 0;
$iteration = 0;

while (true) {
    $n += 2; 
    $term = 1 / $n;
    $sum += $term;
    $iteration++;
    
    printf("Lần %d: n=%d, 1/n=%.6f, Tổng=%.6f\n", $iteration, $n, $term, $sum);
    
    if ($term <= $epsilon) {
        break;
    }
}

echo "\nKết quả:\n";
printf("Dừng tại lần: %d\n", $iteration);
printf("n cuối: %d\n", $n);
printf("Tổng cuối: %.6f\n", $sum);

?>