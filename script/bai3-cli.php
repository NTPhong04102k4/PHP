<?php

echo "=== BÀI 3: TÍNH BIỂU THỨC S(x, n) ===\n\n";

function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}

function calculateS($x, $n) {
    $sum = 0;
    
    for ($i = 1; $i <= $n; $i++) {
        $term = pow($x, $i) / factorial($i);
        $sum += $term;
        
        printf("i=%d: x^%d/%d! = %.6f, Tổng = %.6f\n",
               $i, $i, $i, $term, $sum);
    }
    
    return $sum;
}

$x = 2;
$n = 5;

echo "x = $x, n = $n\n";
echo "S(x, n) = x + (x²/2!) + (x³/3!) + ... + (xⁿ/n!)\n\n";

$result = calculateS($x, $n);

echo "\nKết quả:\n";
printf("S(%d, %d) = %.6f\n", $x, $n, $result);

?>
