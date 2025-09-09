# Website Học Lập Trình PHP

## 📋 Thông tin dự án

**Tác giả:** Nguyễn Thế Phong  
**Khoa:** Công nghệ thông tin  
**Lớp:** CNTT1  
**Khóa:** K63  

## 🎯 Mục đích

Website học lập trình PHP được thiết kế để cung cấp một môi trường học tập tương tác với các bài tập thực hành từ cơ bản đến nâng cao. Dự án bao gồm 11 bài tập PHP khác nhau, từ các thuật toán toán học đến lập trình hướng đối tượng.

## 🚀 Tính năng chính

- **Giao diện web hiện đại:** Thiết kế responsive với CSS3 và JavaScript
- **11 bài tập PHP:** Từ cơ bản đến nâng cao
- **Tương tác trực tiếp:** Nhập liệu và xem kết quả ngay lập tức
- **Validation dữ liệu:** Kiểm tra đầu vào và xử lý lỗi
- **Giao diện thân thiện:** Dễ sử dụng cho người mới học

## 📁 Cấu trúc dự án

```
PHP/
├── index.html              # Trang chủ website
├── index.css               # CSS chính cho giao diện
├── bai11.css               # CSS cho bài 11 (form đăng nhập/đăng ký)
├── bai11.js                # JavaScript cho bài 11
└── script/                 # Thư mục chứa các bài tập PHP
    ├── bai1-cli.php        # Bài 1: Tính tổng số nguyên tố
    ├── bai2a-cli.php       # Bài 2a: Tính tổng 1/2 + 2/3 + ... + n/(n+1)
    ├── bai2b-cli.php       # Bài 2b: [Mô tả chi tiết]
    ├── bai3-cli.php        # Bài 3: Tính biểu thức S(x, n) = x + (x²/2!) + ...
    ├── bai4-cli.php        # Bài 4: [Mô tả chi tiết]
    ├── bai5-cli.php        # Bài 5: Kiểm tra số hoàn hảo
    ├── bai6-cli.php        # Bài 6: [Mô tả chi tiết]
    ├── bai7-cli.php        # Bài 7: [Mô tả chi tiết]
    ├── bai8-cli.php        # Bài 8: [Mô tả chi tiết]
    ├── bai9-cli.php        # Bài 9: [Mô tả chi tiết]
    └── bai10-cli.php       # Bài 10: Class PERSON và SINHVIEN (OOP)
```

## 📚 Danh sách bài tập

### Bài 1: Tính tổng các số nguyên tố
- **Mô tả:** Tính tổng các số nguyên tố trong một khoảng cho trước
- **Kỹ thuật:** Thuật toán kiểm tra số nguyên tố, vòng lặp
- **File:** `script/bai1-cli.php`

### Bài 2a: Tính tổng chuỗi số
- **Mô tả:** Tính tổng 1/2 + 2/3 + ... + n/(n+1)
- **Kỹ thuật:** Vòng lặp, tính toán số thực
- **File:** `script/bai2a-cli.php`

### Bài 3: Tính biểu thức S(x, n)
- **Mô tả:** S(x, n) = x + (x²/2!) + (x³/3!) + ... + (xⁿ/n!)
- **Kỹ thuật:** Hàm giai thừa, lũy thừa, vòng lặp
- **File:** `script/bai3-cli.php`

### Bài 5: Kiểm tra số hoàn hảo
- **Mô tả:** Kiểm tra xem một số có phải là số hoàn hảo hay không
- **Kỹ thuật:** Tìm ước số, tính tổng
- **File:** `script/bai5-cli.php`

### Bài 10: Lập trình hướng đối tượng
- **Mô tả:** Class PERSON và SINHVIEN với tính kế thừa
- **Kỹ thuật:** OOP, kế thừa, constructor, method override
- **File:** `script/bai10-cli.php`

### Bài 11: Form đăng nhập/đăng ký
- **Mô tả:** Giao diện đăng nhập và đăng ký với validation
- **Kỹ thuật:** HTML form, CSS styling, JavaScript validation
- **File:** `index.html` (phần exercise-11), `bai11.js`, `bai11.css`

## 🛠️ Công nghệ sử dụng

### Frontend
- **HTML5:** Cấu trúc trang web
- **CSS3:** Styling và responsive design
- **JavaScript:** Tương tác và validation

### Backend
- **PHP:** Xử lý logic và tính toán
- **PHP OOP:** Lập trình hướng đối tượng

## 🚀 Cách chạy dự án

### Yêu cầu hệ thống
- PHP 7.4 trở lên
- Web server (Apache, Nginx, hoặc PHP built-in server)

### Cách 1: Sử dụng PHP built-in server
```bash
# Di chuyển vào thư mục dự án
cd PHP

# Khởi động server
php -S localhost:8000

# Truy cập website
# Mở trình duyệt và vào: http://localhost:8000
```

### Cách 2: Sử dụng XAMPP/WAMP
1. Copy thư mục dự án vào `htdocs` (XAMPP) hoặc `www` (WAMP)
2. Khởi động Apache
3. Truy cập: `http://localhost/PHP`

## 📖 Hướng dẫn sử dụng

1. **Mở trang chủ:** Truy cập `index.html`
2. **Chọn bài tập:** Click vào các bài tập ở sidebar bên trái
3. **Nhập dữ liệu:** Điền thông tin vào form
4. **Xem kết quả:** Click nút submit để xem kết quả

### Ví dụ sử dụng Bài 1:
1. Chọn "Bài 1" từ sidebar
2. Nhập giá trị bắt đầu (ví dụ: 1)
3. Nhập giá trị kết thúc (ví dụ: 100)
4. Click "Tính tổng số nguyên tố"
5. Xem kết quả hiển thị

## 🎨 Giao diện

Website có giao diện hiện đại với:
- **Header:** Thông tin cá nhân và thanh tìm kiếm
- **Navigation:** Menu điều hướng các chủ đề
- **Sidebar:** Danh sách các bài tập
- **Main content:** Nội dung bài tập và kết quả
- **Responsive design:** Tương thích với mobile

## 🔧 Tính năng kỹ thuật

### Validation và Error Handling
- Kiểm tra dữ liệu đầu vào
- Hiển thị thông báo lỗi rõ ràng
- Giới hạn giá trị để tránh overflow

### Security
- Sử dụng `htmlspecialchars()` để tránh XSS
- Validation dữ liệu phía server
- Kiểm tra kiểu dữ liệu

### Performance
- Tối ưu thuật toán (ví dụ: kiểm tra số nguyên tố chỉ đến √n)
- Giới hạn phạm vi tính toán để tránh timeout

## 📝 Ghi chú phát triển

- Tất cả file PHP đều có header UTF-8 để hỗ trợ tiếng Việt
- CSS được tối ưu với inline styles cho từng bài tập
- JavaScript được tổ chức theo module
- Code được comment rõ ràng và dễ hiểu

## 🤝 Đóng góp

Dự án này được tạo ra cho mục đích học tập. Nếu bạn muốn đóng góp:
1. Fork repository
2. Tạo branch mới cho tính năng
3. Commit changes
4. Tạo Pull Request

## 📄 License

Dự án này được tạo ra cho mục đích học tập và nghiên cứu.

## 📞 Liên hệ

**Nguyễn Thế Phong**  
Khoa Công nghệ thông tin - Lớp CNTT1 - Khóa K63

---

*Website học lập trình PHP - Nơi học tập và thực hành hiệu quả!*
