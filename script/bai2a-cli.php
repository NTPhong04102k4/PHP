<?php
header('Content-Type: text/html; charset=UTF-8');

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = isset($_POST['n']) ? (int)$_POST['n'] : 6;
    
    if ($n < 1) {
        $error = "Giá trị n phải lớn hơn 0";
    } elseif ($n > 1000) {
        $error = "Giá trị n không được vượt quá 1000";
    } else {
        $sum = 0;
        $steps = [];
        
        for ($i = 1; $i <= $n; $i++) {
            $term = $i / ($i + 1);
            $sum += $term;
            $steps[] = [
                'i' => $i,
                'term' => $term,
                'sum' => $sum
            ];
        }
        
        $result = [
            'n' => $n,
            'sum' => $sum,
            'steps' => $steps
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bài 2a</title>
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
    <h2>=== BÀI 2a: TÍNH TỔNG 1/2 + 2/3 + ... + n/(n+1) ===</h2>
    <form method="post" class="section">
      <div class="form-group">
        <label for="n">Giá trị n:</label>
        <input type="number" id="n" name="n" value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : '6' ?>" min="1" max="1000" required>
      </div>
      <button type="submit" class="btn">Tính tổng</button>
    </form>

    <?php if ($error) { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <?php if ($result) { ?>
      <div class="success">Kết quả tính toán:</div>
      <div class="section">
        <pre><?php
echo "n = " . $result['n'] . "\n\n";
foreach ($result['steps'] as $step) {
    printf("Lần %d: %d/%d = %.6f, Tổng = %.6f\n", 
           $step['i'], $step['i'], $step['i'] + 1, $step['term'], $step['sum']);
}
echo "\nKết quả:\n";
printf("Tổng cuối: %.6f\n", $result['sum']);
        ?></pre>
      </div>
    <?php } ?>
  </div>
</body>
</html>