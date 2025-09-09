<?php

echo "=== BÀI 10: CLASS PERSON VÀ SINHVIEN ===\n\n";

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
        echo "Họ tên: " . $this->hoTen . "\n";
        echo "Ngày sinh: " . $this->ngaySinh . "\n";
        echo "Quê quán: " . $this->queQuan . "\n";
    }
}

class SINHVIEN extends PERSON {
    private $lop;
    
    public function __construct($hoTen, $ngaySinh, $queQuan, $lop) {
        parent::__construct($hoTen, $ngaySinh, $queQuan);
        $this->lop = $lop;
    }
    
    public function hienThiThongTin() {
        parent::hienThiThongTin();
        echo "Lớp: " . $this->lop . "\n";
    }
}

$sinhVien = new SINHVIEN("Nguyễn Văn A", "15/03/2000", "Hà Nội", "CNTT01");

echo "THÔNG TIN SINH VIÊN:\n";
echo "==================\n";
$sinhVien->hienThiThongTin();

echo "\nKết quả:\n";
echo "Class SINHVIEN kế thừa từ PERSON\n";
echo "Thêm thuộc tính: lớp\n";

?>
