<?php
// kết nối database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // 'root' cho XAMPP
define('DB_PASSWORD', '');     // rỗng cho XAMPP
define('DB_NAME', 'guestbook_db');

// tạo kết nối 
 $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// đặt charset thành utf8mb4 để hỗ trợ tiếng Việt 
 $conn->set_charset("utf8mb4");
?>