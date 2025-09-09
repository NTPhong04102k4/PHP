<?php

$n = 6;

echo "n = $n\n\n";

$sum = 0;
$i = 1;

while ($i <= $n) {
    $term = $i / ($i + 1);
    $sum += $term;
    
    printf("Lần %d: %d/%d = %.6f, Tổng = %.6f\n", $i, $i, $i + 1, $term, $sum);
    
    $i++;
}

echo "\nKết quả:\n";
printf("Tổng cuối: %.6f\n", $sum);

?>