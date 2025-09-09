<?php

echo "=== BÀI 9: CHUYỂN ĐỔI GIÂY THÀNH GIỜ:PHÚT:GIÂY ===\n\n";

function convertSeconds($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $secs = $seconds % 60;
    
    return sprintf("%02d:%02d:%02d", $hours, $minutes, $secs);
}

$testSeconds = 3769;
$result = convertSeconds($testSeconds);

echo "Nhập vào: $testSeconds giây\n";
echo "Kết quả: $result\n";

echo "\nLogic:\n";
echo "Giờ = giây ÷ 3600\n";
echo "Phút = (giây % 3600) ÷ 60\n";
echo "Giây = giây % 60\n";

?>
