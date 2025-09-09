<?php
header('Content-Type: text/html; charset=UTF-8');

function findDivisors($n) {
    $divisors = [];
    
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) {
            $divisors[] = $i;
        }
    }
    
    return $divisors;
}

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = isset($_POST['number']) ? (int)$_POST['number'] : 12;
    
    if ($number < 1) {
        $error = "Số phải lớn hơn 0";
    } elseif ($number > 10000) {
        $error = "Số không được vượt quá 10000";
    } else {
        $divisors = findDivisors($number);
        $result = ['number' => $number, 'divisors' => $divisors];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bài 7</title>
  <style>
    body{font-family:Segoe UI,Tahoma,Verdana,sans-serif;padding:16px;line-height:1.5}
    .card{border:1px solid #e5e7eb;border-radius:8px;padding:16px;max-width:720px;margin:0 auto}
    .form-group{margin-bottom:16px}
    label{display:block;margin-bottom:8px;font-weight:600}
    input[type="number"]{width:100%;padding:10px;border:1px solid #d1d5db;border-radius:6px;box-sizing:border-box}
    .btn{margin-top:12px;background:#3b82f6;color:#fff;border:none;padding:10px 14px;border-radius:6px;cursor:pointer}
    .btn:hover{background:#2563eb}
    .section{margin-top:16px}
    pre{white-space:pre-wrap;word-break:break-word;background:#f9fafb;border:1px solid #e5e7eb;border-radius:6px;padding:12px}
    .error{background:#fef2f2;border:1px solid #fecaca;color:#dc2626;padding:8px 12px;border-radius:6px;margin-top:8px}
    .success{background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:8px 12px;border-radius:6px;margin-top:8px}
  </style>
</head>
<body>
  <div class="card">
    <h2>=== BÀI 7: LIỆT KÊ ƯỚC SỐ ===</h2>
    <p>Ước số: Các số chia hết cho số đã cho</p>
    <form method="post" class="section">
      <div class="form-group">
        <label for="number">Nhập số cần tìm ước:</label>
        <input type="number" id="number" name="number" value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : '12' ?>" min="1" max="10000" required>
      </div>
      <button type="submit" class="btn">Tìm ước số</button>
    </form>

    <?php if ($error) { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <?php if ($result) { ?>
      <div class="success">Kết quả tìm ước số:</div>
      <div class="section">
        <pre><?php
echo "Ước số của " . $result['number'] . ":\n";
echo implode(', ', $result['divisors']) . "\n";
echo "\nKết quả:\n";
echo "Tổng số ước: " . count($result['divisors']) . "\n";
echo "Ước số: Các số chia hết cho " . $result['number'] . "\n";
        ?></pre>
      </div>
    <?php } ?>
  </div>
</body>
</html>
