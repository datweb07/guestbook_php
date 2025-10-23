### Guestbook bằng PHP

---

## Tính năng

-   Người dùng có thể xem các lời nhắn đã được đăng.
-   Người dùng có thể điền vào một form để gửi lời nhắn mới.
-   Các lời nhắn mới nhất sẽ hiển thị trên cùng.

## Công nghệ sử dụng

-   **PHP**.
-   **MySQL**.
-   **HTML5 & CSS3**.
-   **MySQLi**.

---

Trước khi bắt đầu, hãy đảm bảo bạn đã cài đặt một máy chủ web local trên máy tính:

-   [XAMPP](https://www.apachefriends.org/) (cho Windows, macOS, Linux)

## Hướng dẫn cài đặt và chạy
### Bước 1: Clone dự án
Clone repository này về máy tính của bạn.

```
git clone https://github.com/datweb07/guestbook_php.git
```

### Bước 2: Di chuyển thư mục dự án

Sau khi clone, bạn sẽ có một thư mục tên là `guestbook_php-main`. Hãy di chuyển hoặc sao chép thư mục này vào trong thư mục `htdocs` của XAMPP.

-   Đường dẫn mặc định của `htdocs` thường là `C:/xampp/htdocs/` (trên Windows).

Sau khi di chuyển, đường dẫn đến dự án của bạn sẽ là `C:/xampp/htdocs/guestbook_php-main/`.

### Bước 3: Cấu hình Cơ sở dữ liệu (Database)

1.  **Start Apache và MySQL** từ giao diện của XAMPP.

2.  **Tạo Database:**
    -   Mở trình duyệt và truy cập vào [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
    -   Trong mục "Tạo cơ sở dữ liệu", nhập tên `guestbook_db` và nhấn nút **Tạo**.

3.  **Tạo Bảng dữ liệu:**
    -   Chọn database `guestbook_db` vừa tạo từ danh sách bên trái.
    -   Nhấp vào tab **SQL**.
    -   Sao chép và dán đoạn mã SQL sau vào ô trống, sau đó nhấn **Thực hiện**:

    ```sql
    CREATE TABLE `messages` (
      `id` INT(11) NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(100) NOT NULL,
      `message` TEXT NOT NULL,
      `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ```

Bảng `messages` sẽ được tạo ra để lưu trữ các lời nhắn.

### Bước 4: Kiểm tra cấu hình kết nối

Mở file `db.php` trong thư mục dự án. Thông tin kết nối đã được cấu hình sẵn cho môi trường XAMPP mặc định:

```php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Tên người dùng mặc định
define('DB_PASSWORD', '');     // Mật khẩu mặc định thường là rỗng
define('DB_NAME', 'guestbook_db');
```

Nếu bạn đã thay đổi tên người dùng hoặc mật khẩu MySQL, hãy chỉnh sửa các hằng số này cho phù hợp.

### Bước 5: Khởi chạy ứng dụng

Mở trình duyệt và truy cập vào địa chỉ sau:

[http://localhost/guestbook-php/](http://localhost/guestbook/)

## Cấu trúc thư mục

```
guestbook_php-main/
├── db.php          # File kết nối đến cơ sở dữ liệu MySQL
├── index.php       # File chính, chứa form, logic xử lý và hiển thị
├── style.css       # File CSS để trang trí giao diện
└── README.md       # File hướng dẫn này
```

## Tác giả

-   **datweb07** - *[Github](https://github.com/datweb07)*
---
⭐ **Star repo này nếu bạn thấy hữu ích cho việc học tập!**

*Cập nhật lần cuối: October 2025*
