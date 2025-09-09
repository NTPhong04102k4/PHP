<?php
header('Content-Type: text/html; charset=UTF-8');

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
    return ['sum' => $sum, 'primes' => $primes];
}

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start = isset($_POST['start']) ? (int)$_POST['start'] : 1;
    $end = isset($_POST['end']) ? (int)$_POST['end'] : 100;
    
    if ($start < 1 || $end < 1) {
        $error = "Giá trị phải lớn hơn 0";
    } elseif ($start > $end) {
        $error = "Giá trị bắt đầu phải nhỏ hơn hoặc bằng giá trị kết thúc";
    } elseif ($end > 10000) {
        $error = "Giá trị kết thúc không được vượt quá 10000";
    } else {
        $result = sumOfPrimes($start, $end);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài 1</title>
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
        <h2>=== BÀI 1: TÍNH TỔNG CÁC SỐ NGUYÊN TỐ ===</h2>
        <form method="post" class="section">
            <div class="form-group">
                <label for="start">Giá trị bắt đầu:</label>
                <input type="number" id="start" name="start" value="<?php echo isset($_POST['start']) ? htmlspecialchars($_POST['start']) : '1' ?>" min="1" max="10000" required>
            </div>
            <div class="form-group">
                <label for="end">Giá trị kết thúc:</label>
                <input type="number" id="end" name="end" value="<?php echo isset($_POST['end']) ? htmlspecialchars($_POST['end']) : '100' ?>" min="1" max="10000" required>
            </div>
            <button type="submit" class="btn">Tính tổng số nguyên tố</button>
        </form>

        <?php if ($error) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <?php if ($result) { ?>
            <div class="success">Kết quả tính toán:</div>
            <div class="section">
                <pre><?php
echo "Khoảng: " . $_POST['start'] . " đến " . $_POST['end'] . "\n";
echo "Tổng các số nguyên tố: " . $result['sum'] . "\n";
echo "Các số nguyên tố: " . implode(', ', $result['primes']) . "\n";
echo "Tổng số lượng: " . count($result['primes']) . " số";
                ?></pre>
            </div>
        <?php } ?>
    </div>
</body>
</html>
