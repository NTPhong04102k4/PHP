<?php
header('Content-Type: text/html; charset=UTF-8');

function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}

function calculateS($x, $n) {
    $sum = 0;
    $steps = [];
    
    for ($i = 1; $i <= $n; $i++) {
        $term = pow($x, $i) / factorial($i);
        $sum += $term;
        $steps[] = [
            'i' => $i,
            'term' => $term,
            'sum' => $sum
        ];
    }
    
    return ['sum' => $sum, 'steps' => $steps];
}

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $x = isset($_POST['x']) ? (float)$_POST['x'] : 2;
    $n = isset($_POST['n']) ? (int)$_POST['n'] : 5;
    
    if ($n < 1) {
        $error = "Giá trị n phải lớn hơn 0";
    } elseif ($n > 20) {
        $error = "Giá trị n không được vượt quá 20 (để tránh overflow)";
    } elseif ($x < -100 || $x > 100) {
        $error = "Giá trị x phải trong khoảng -100 đến 100";
    } else {
        $result = calculateS($x, $n);
        $result['x'] = $x;
        $result['n'] = $n;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bài 3</title>
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
    <h2>=== BÀI 3: TÍNH BIỂU THỨC S(x, n) ===</h2>
    <p>S(x, n) = x + (x²/2!) + (x³/3!) + ... + (xⁿ/n!)</p>
    <form method="post" class="section">
      <div class="form-group">
        <label for="x">Giá trị x:</label>
        <input type="number" id="x" name="x" value="<?php echo isset($_POST['x']) ? htmlspecialchars($_POST['x']) : '2' ?>" step="any" min="-100" max="100" required>
      </div>
      <div class="form-group">
        <label for="n">Giá trị n:</label>
        <input type="number" id="n" name="n" value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : '5' ?>" min="1" max="20" required>
      </div>
      <button type="submit" class="btn">Tính S(x, n)</button>
    </form>

    <?php if ($error) { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <?php if ($result) { ?>
      <div class="success">Kết quả tính toán:</div>
      <div class="section">
        <pre><?php
echo "x = " . $result['x'] . ", n = " . $result['n'] . "\n";
echo "S(x, n) = x + (x²/2!) + (x³/3!) + ... + (xⁿ/n!)\n\n";
foreach ($result['steps'] as $step) {
    printf("i=%d: x^%d/%d! = %.6f, Tổng = %.6f\n",
           $step['i'], $step['i'], $step['i'], $step['term'], $step['sum']);
}
echo "\nKết quả:\n";
printf("S(%.1f, %d) = %.6f\n", $result['x'], $result['n'], $result['sum']);
        ?></pre>
      </div>
    <?php } ?>
  </div>
</body>
</html>
