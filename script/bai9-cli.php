<?php
header('Content-Type: text/html; charset=UTF-8');

function convertSeconds($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $secs = $seconds % 60;
    
    return sprintf("%02d:%02d:%02d", $hours, $minutes, $secs);
}

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seconds = isset($_POST['seconds']) ? (int)$_POST['seconds'] : 3769;
    
    if ($seconds < 0) {
        $error = "Số giây phải lớn hơn hoặc bằng 0";
    } elseif ($seconds > 86400) {
        $error = "Số giây không được vượt quá 86400 (24 giờ)";
    } else {
        $converted = convertSeconds($seconds);
        $result = ['seconds' => $seconds, 'converted' => $converted];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bài 9</title>
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
    <h2>=== BÀI 9: CHUYỂN ĐỔI GIÂY THÀNH GIỜ:PHÚT:GIÂY ===</h2>
    <form method="post" class="section">
      <div class="form-group">
        <label for="seconds">Nhập số giây:</label>
        <input type="number" id="seconds" name="seconds" value="<?php echo isset($_POST['seconds']) ? htmlspecialchars($_POST['seconds']) : '3769' ?>" min="0" max="86400" required>
      </div>
      <button type="submit" class="btn">Chuyển đổi</button>
    </form>

    <?php if ($error) { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <?php if ($result) { ?>
      <div class="success">Kết quả chuyển đổi:</div>
      <div class="section">
        <pre><?php
echo "Nhập vào: " . $result['seconds'] . " giây\n";
echo "Kết quả: " . $result['converted'] . "\n";
echo "\nLogic:\n";
echo "Giờ = giây ÷ 3600\n";
echo "Phút = (giây % 3600) ÷ 60\n";
echo "Giây = giây % 60\n";
        ?></pre>
      </div>
    <?php } ?>
  </div>
</body>
</html>
