<?php
header('Content-Type: text/html; charset=UTF-8');

$result = null;
$error = '';
$selected_exercise = isset($_POST['exercise']) ? $_POST['exercise'] : '2a';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($selected_exercise === '2a') {
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
                'exercise' => '2a',
                'n' => $n,
                'sum' => $sum,
                'steps' => $steps
            ];
        }
    } else {
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
                'exercise' => '2b',
                'n_default' => $n_default,
                'epsilon' => $epsilon,
                'final_iteration' => $iteration,
                'final_n' => $n,
                'final_sum' => $sum,
                'steps' => $steps
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
  <title>Bài 2 - Tổng hợp</title>
  <style>
    body{font-family:Segoe UI,Tahoma,Verdana,sans-serif;padding:16px;line-height:1.5}
    .card{border:1px solid #e5e7eb;border-radius:8px;padding:16px;max-width:720px;margin:0 auto}
    .form-group{margin-bottom:16px}
    label{display:block;margin-bottom:8px;font-weight:600}
    input[type="number"]{width:100%;padding:10px;border:1px solid #d1d5db;border-radius:6px;box-sizing:border-box}
    select{width:100%;padding:10px;border:1px solid #d1d5db;border-radius:6px;box-sizing:border-box;margin-bottom:16px}
    .btn{margin-top:12px;background:#3b82f6;color:#fff;border:none;padding:10px 14px;border-radius:6px;cursor:pointer}
    .btn:hover{background:#2563eb}
    .section{margin-top:16px}
    pre{white-space:pre-wrap;word-break:break-word;background:#f9fafb;border:1px solid #e5e7eb;border-radius:6px;padding:12px}
    .error{background:#fef2f2;border:1px solid #fecaca;color:#dc2626;padding:8px 12px;border-radius:6px;margin-top:8px}
    .success{background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:8px 12px;border-radius:6px;margin-top:8px}
    .exercise-info{background:#f0f9ff;border:1px solid #bae6fd;color:#0c4a6e;padding:12px;border-radius:6px;margin-bottom:16px}
  </style>
</head>
<body>
  <div class="card">
    <h2>=== BÀI 2: TÍNH TỔNG - TỔNG HỢP ===</h2>
    
    <form method="post" class="section">
      <div class="form-group">
        <label for="exercise">Chọn bài tập:</label>
        <select id="exercise" name="exercise" onchange="this.form.submit()">
          <option value="2a" <?php echo $selected_exercise === '2a' ? 'selected' : ''; ?>>Bài 2a: Tổng 1/2 + 2/3 + ... + n/(n+1)</option>
          <option value="2b" <?php echo $selected_exercise === '2b' ? 'selected' : ''; ?>>Bài 2b: Tổng 1/2 + 1/4 + 1/6 + ... (dừng khi 1/n ≤ ε)</option>
        </select>
      </div>
      
      <div class="exercise-info">
        <?php if ($selected_exercise === '2a') { ?>
          <strong>Bài 2a:</strong> Tính tổng S = 1/2 + 2/3 + 3/4 + ... + n/(n+1)<br>
          <em>Nhập giá trị n (1 ≤ n ≤ 1000)</em>
        <?php } else { ?>
          <strong>Bài 2b:</strong> Tính tổng S = 1/2 + 1/4 + 1/6 + ... dừng khi 1/n ≤ ε<br>
          <em>Nhập giá trị n để tính epsilon = 1/n (1 ≤ n ≤ 100)</em>
        <?php } ?>
      </div>
      
      <div class="form-group">
        <label for="n">Giá trị n:</label>
        <input type="number" id="n" name="n" 
               value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : '6' ?>" 
               min="1" 
               max="<?php echo $selected_exercise === '2a' ? '1000' : '100'; ?>" 
               required>
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
        if ($result['exercise'] === '2a') {
            echo "=== BÀI 2a: TỔNG 1/2 + 2/3 + ... + n/(n+1) ===\n";
            echo "n = " . $result['n'] . "\n\n";
            foreach ($result['steps'] as $step) {
                printf("Lần %d: %d/%d = %.6f, Tổng = %.6f\n", 
                       $step['i'], $step['i'], $step['i'] + 1, $step['term'], $step['sum']);
            }
            echo "\nKết quả:\n";
            printf("Tổng cuối: %.6f\n", $result['sum']);
        } else {
            echo "=== BÀI 2b: TỔNG 1/2 + 1/4 + 1/6 + ... (DỪNG KHI 1/n ≤ ε) ===\n";
            echo "n = " . $result['n_default'] . ", epsilon = " . $result['epsilon'] . "\n\n";
            foreach ($result['steps'] as $step) {
                printf("Lần %d: n=%d, 1/n=%.6f, Tổng=%.6f\n", 
                       $step['iteration'], $step['n'], $step['term'], $step['sum']);
            }
            echo "\nKết quả:\n";
            printf("Dừng tại lần: %d\n", $result['final_iteration']);
            printf("n cuối: %d\n", $result['final_n']);
            printf("Tổng cuối: %.6f\n", $result['final_sum']);
        }
        ?></pre>
      </div>
    <?php } ?>
  </div>
</body>
</html>