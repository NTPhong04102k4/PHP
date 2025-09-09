<?php
header('Content-Type: text/html; charset=UTF-8');

$numbers = [];
$messages = [];
$count = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw = isset($_POST['numbers']) ? trim($_POST['numbers']) : '';
    if ($raw !== '') {
        // Allow separators: comma, space, newline, semicolon
        $parts = preg_split('/[\s,;]+/', $raw);
        foreach ($parts as $part) {
            if ($part === '') continue;
            if (!is_numeric($part)) {
                $messages[] = "Bỏ qua giá trị không hợp lệ: " . htmlspecialchars($part, ENT_QUOTES, 'UTF-8');
                continue;
            }
            $number = (int)$part;
            if ($number === 0) {
                $messages[] = "Gặp số 0 → dừng nhận thêm.";
                break;
            }
            $numbers[] = $number;
        }
        $count = count($numbers);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bài 4</title>
  <style>
    body{font-family:Segoe UI,Tahoma,Verdana,sans-serif;padding:16px;line-height:1.5}
    .card{border:1px solid #e5e7eb;border-radius:8px;padding:16px;max-width:720px;margin:0 auto}
    label{display:block;margin-bottom:8px;font-weight:600}
    textarea{width:100%;min-height:120px;padding:10px;border:1px solid #d1d5db;border-radius:6px}
    .hint{color:#6b7280;font-size:12px;margin-top:6px}
    .btn{margin-top:12px;background:#3b82f6;color:#fff;border:none;padding:10px 14px;border-radius:6px;cursor:pointer}
    .btn:hover{background:#2563eb}
    .section{margin-top:16px}
    pre{white-space:pre-wrap;word-break:break-word;background:#f9fafb;border:1px solid #e5e7eb;border-radius:6px;padding:12px}
    .msg{background:#fff7ed;border:1px solid #fed7aa;color:#9a3412;padding:8px 12px;border-radius:6px;margin-top:8px}
  </style>
</head>
<body>
  <div class="card">
    <h2>=== BÀI 4: NHẬP SỐ CHO ĐẾN KHI NHẬP 0 ===</h2>
    <form method="post" class="section">
      <label for="numbers">Nhập các số (ngăn cách bởi dấu phẩy, khoảng trắng hoặc xuống dòng). Gặp 0 sẽ dừng:</label>
      <textarea id="numbers" name="numbers" placeholder="Ví dụ: 5, 12, 7, 0, 99"><?php echo isset($_POST['numbers']) ? htmlspecialchars($_POST['numbers'], ENT_QUOTES, 'UTF-8') : '' ?></textarea>
      <div class="hint">Chỉ nhận số nguyên. Bất kỳ giá trị không hợp lệ sẽ bị bỏ qua.</div>
      <button type="submit" class="btn">Xử lý</button>
    </form>

    <?php if (!empty($messages)) { ?>
      <?php foreach ($messages as $m) { ?>
        <div class="msg"><?php echo $m; ?></div>
      <?php } ?>
    <?php } ?>

    <div class="section">
      <h3>Kết quả</h3>
      <pre><?php
echo "Tổng số đã nhập: " . $count . "\n";
echo "Các số đã nhập: " . ($count ? implode(', ', $numbers) : '(trống)') . "\n";
      ?></pre>
    </div>
  </div>
</body>
</html>
