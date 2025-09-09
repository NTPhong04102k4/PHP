<?php


echo "=== BÀI 1: TÍNH TỔNG CÁC SỐ NGUYÊN TỐ TỪ 1 ĐẾN 100 ===\n\n";

function isPrime($n) {
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function sumOfPrimes($start, $end) {
    $sum = 0;
    $primes = [];
    for ($i = $start; $i <= $end; $i++) {
        if (isPrime($i)) {
            $sum += $i;
            $primes[] = $i;
        }
    }
    echo "Tổng các số nguyên tố: $sum\n\n";
    
    return ['sum' => $sum, 'primes' => $primes];
}

$result = sumOfPrimes(1, 100);
?>
