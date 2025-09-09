<?php
header('Content-Type: text/html; charset=UTF-8');

class PERSON {
    protected $hoTen;
    protected $ngaySinh;
    protected $queQuan;
    
    public function __construct($hoTen, $ngaySinh, $queQuan) {
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
        $this->queQuan = $queQuan;
    }
    
    public function hienThiThongTin() {
        return "Họ tên: " . $this->hoTen . "\n" .
               "Ngày sinh: " . $this->ngaySinh . "\n" .
               "Quê quán: " . $this->queQuan . "\n";
    }
}

class SINHVIEN extends PERSON {
    private $lop;
    
    public function __construct($hoTen, $ngaySinh, $queQuan, $lop) {
        parent::__construct($hoTen, $ngaySinh, $queQuan);
        $this->lop = $lop;
    }
    
    public function hienThiThongTin() {
        return parent::hienThiThongTin() . "Lớp: " . $this->lop . "\n";
    }
}

$result = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoTen = isset($_POST['hoTen']) ? trim($_POST['hoTen']) : '';
    $ngaySinh = isset($_POST['ngaySinh']) ? trim($_POST['ngaySinh']) : '';
    $queQuan = isset($_POST['queQuan']) ? trim($_POST['queQuan']) : '';
    $lop = isset($_POST['lop']) ? trim($_POST['lop']) : '';
    
    if (empty($hoTen) || empty($ngaySinh) || empty($queQuan) || empty($lop)) {
        $error = "Vui lòng điền đầy đủ thông tin";
    } else {
        $sinhVien = new SINHVIEN($hoTen, $ngaySinh, $queQuan, $lop);
        $result = $sinhVien->hienThiThongTin();
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bài 10</title>
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
    <h2>=== BÀI 10: CLASS PERSON VÀ SINHVIEN ===</h2>
    <p>Class SINHVIEN kế thừa từ PERSON, thêm thuộc tính: lớp</p>
    <form method="post" class="section">
      <div class="form-group">
        <label for="hoTen">Họ tên:</label>
        <input type="text" id="hoTen" name="hoTen" value="<?php echo isset($_POST['hoTen']) ? htmlspecialchars($_POST['hoTen'], ENT_QUOTES, 'UTF-8') : 'Nguyễn Văn A' ?>" required>
      </div>
      <div class="form-group">
        <label for="ngaySinh">Ngày sinh:</label>
        <input type="text" id="ngaySinh" name="ngaySinh" value="<?php echo isset($_POST['ngaySinh']) ? htmlspecialchars($_POST['ngaySinh'], ENT_QUOTES, 'UTF-8') : '15/03/2000' ?>" placeholder="dd/mm/yyyy" required>
      </div>
      <div class="form-group">
        <label for="queQuan">Quê quán:</label>
        <input type="text" id="queQuan" name="queQuan" value="<?php echo isset($_POST['queQuan']) ? htmlspecialchars($_POST['queQuan'], ENT_QUOTES, 'UTF-8') : 'Hà Nội' ?>" required>
      </div>
      <div class="form-group">
        <label for="lop">Lớp:</label>
        <input type="text" id="lop" name="lop" value="<?php echo isset($_POST['lop']) ? htmlspecialchars($_POST['lop'], ENT_QUOTES, 'UTF-8') : 'CNTT01' ?>" required>
      </div>
      <button type="submit" class="btn">Tạo sinh viên</button>
    </form>

    <?php if ($error) { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <?php if ($result) { ?>
      <div class="success">Thông tin sinh viên:</div>
      <div class="section">
        <pre><?php
echo "THÔNG TIN SINH VIÊN:\n";
echo "==================\n";
echo $result;
echo "\nKết quả:\n";
echo "Class SINHVIEN kế thừa từ PERSON\n";
echo "Thêm thuộc tính: lớp\n";
        ?></pre>
      </div>
    <?php } ?>
  </div>
</body>
</html>
