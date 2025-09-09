<?php
header('Content-Type: text/html; charset=UTF-8');

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n_default = isset($_POST['n']) ? (int)$_POST['n'] : 6;
    
    if ($n_default < 1) {
        $error = "Giá trị n phải lớn hơn 0";
    } elseif ($n_default > 100) {
        $error = "Giá trị n không được vượt quá 100";
    } else {
        $epsilon = 1 / $n_default;
        $sum = 0;
        $n = 0;
        $iteration = 0;
        $steps = [];
        
        while (true) {
            $n += 2; 
            $term = 1 / $n;
            $sum += $term;
            $iteration++;
            
            $steps[] = [
                'iteration' => $iteration,
                'n' => $n,
                'term' => $term,
                'sum' => $sum
            ];
            
            if ($term <= $epsilon) {
                break;
            }
        }
        
        $result = [
            'n_default' => $n_default,
            'epsilon' => $epsilon,
            'final_iteration' => $iteration,
            'final_n' => $n,
            'final_sum' => $sum,
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
  <title>Bài 2b</title>
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
    <h2>=== BÀI 2b: TÍNH TỔNG 1/2 + 1/4 + 1/6 + ... (DỪNG KHI 1/n ≤ ε) ===</h2>
    <form method="post" class="section">
      <div class="form-group">
        <label for="n">Giá trị n (epsilon = 1/n):</label>
        <input type="number" id="n" name="n" value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : '6' ?>" min="1" max="100" required>
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
echo "n = " . $result['n_default'] . ", epsilon = " . $result['epsilon'] . "\n\n";
foreach ($result['steps'] as $step) {
    printf("Lần %d: n=%d, 1/n=%.6f, Tổng=%.6f\n", 
           $step['iteration'], $step['n'], $step['term'], $step['sum']);
}
echo "\nKết quả:\n";
printf("Dừng tại lần: %d\n", $result['final_iteration']);
printf("n cuối: %d\n", $result['final_n']);
printf("Tổng cuối: %.6f\n", $result['final_sum']);
        ?></pre>
      </div>
    <?php } ?>
  </div>
</body>
</html>