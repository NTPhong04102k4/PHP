<?php
header('Content-Type: text/html; charset=UTF-8');

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numbers = isset($_POST['numbers']) ? trim($_POST['numbers']) : '';
    
    if ($numbers === '') {
        $error = "Vui lòng nhập ít nhất một số";
    } else {
        $parts = preg_split('/[\s,;]+/', $numbers);
        $array = [];
        
        foreach ($parts as $part) {
            if ($part === '') continue;
            if (!is_numeric($part)) {
                $error = "Giá trị không hợp lệ: " . htmlspecialchars($part, ENT_QUOTES, 'UTF-8');
                break;
            }
            $array[] = (float)$part;
        }
        
        if (!$error) {
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
            
            $result = [
                'array' => $array,
                'positive' => $positive,
                'negative' => $negative,
                'zero' => $zero
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bài 8</title>
  <style>
    body{font-family:Segoe UI,Tahoma,Verdana,sans-serif;padding:16px;line-height:1.5}
    .card{border:1px solid #e5e7eb;border-radius:8px;padding:16px;max-width:720px;margin:0 auto}
    .form-group{margin-bottom:16px}
    label{display:block;margin-bottom:8px;font-weight:600}
    input[type="text"]{width:100%;padding:10px;border:1px solid #d1d5db;border-radius:6px;box-sizing:border-box}
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
    <h2>=== BÀI 8: ĐẾM SỐ ÂM/DƯƠNG TRONG MẢNG ===</h2>
    <form method="post" class="section">
      <div class="form-group">
        <label for="numbers">Nhập các số (ngăn cách bởi dấu phẩy, khoảng trắng):</label>
        <input type="text" id="numbers" name="numbers" value="<?php echo isset($_POST['numbers']) ? htmlspecialchars($_POST['numbers'], ENT_QUOTES, 'UTF-8') : '-5, 3, -2, 8, -1, 0, 4, -7, 9, -3' ?>" placeholder="Ví dụ: -5, 3, -2, 8, -1, 0, 4, -7, 9, -3">
      </div>
      <button type="submit" class="btn">Đếm số âm/dương</button>
    </form>

    <?php if ($error) { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <?php if ($result) { ?>
      <div class="success">Kết quả đếm:</div>
      <div class="section">
        <pre><?php
echo "Mảng: " . implode(', ', $result['array']) . "\n\n";
echo "Kết quả:\n";
echo "Số dương: " . $result['positive'] . "\n";
echo "Số âm: " . $result['negative'] . "\n";
echo "Số 0: " . $result['zero'] . "\n";
        ?></pre>
      </div>
    <?php } ?>
  </div>
</body>
</html>
