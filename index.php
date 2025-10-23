<?php
// import file kết nối database
require_once 'db.php';

// biến lưu thông báo lỗi
 $error_message = '';

// chỉ xử lý khi có dữ liệu được gửi đi từ form bằng phương thức POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // lấy dữ liệu từ form và làm sạch
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);

    // kiểm tra các field có bị bỏ trống không
    if (empty($name) || empty($message)) {
        $error_message = "Vui lòng điền đầy đủ tên và lời nhắn.";
    } else {
        // câu lệnh insert dữ liệu vào bảng
        $sql = "INSERT INTO messages (name, message) VALUES (?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // gán các biến vào câu lệnh đã chuẩn bị
            $stmt->bind_param("ss", $param_name, $param_message);
            
            // thiết lập các tham số
            $param_name = $name;
            $param_message = $message;
            
            // thực thi câu lệnh
            if ($stmt->execute()) {
                // chuyển hướng về trang chính sau khi gửi thành công
                header("location: index.php");
                exit();
            } else {
                $error_message = "Có lỗi xảy ra. Vui lòng thử lại sau.";
            }

            // đóng statement
            $stmt->close();
        }
    }
}

// lấy tất cả các lời nhắn từ database để hiển thị
 $sql_messages = "SELECT id, name, message, created_at FROM messages ORDER BY created_at DESC";
 $messages = [];
if ($result = $conn->query($sql_messages)) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }
    $result->free();
}

// đóng kết nối database
 $conn->close();
?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sổ Khách</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Sổ Khách</h1>

        <!-- form gửi lời nhắn -->
        <form action="index.php" method="post">
            <h2>Để lại lời nhắn của bạn</h2>

            <?php 
            if (!empty($error_message)) {
                echo "<div class='error'>" . $error_message . "</div>";
            }
            ?>

            <label for="name">Tên của bạn:</label>
            <input type="text" id="name" name="name" required>

            <label for="message">Lời nhắn:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Gửi Lời Nhắn</button>
        </form>

        <hr>

        <!-- hiển thị các lời nhắn -->
        <h2>Các lời nhắn gần đây</h2>

        <?php if (empty($messages)): ?>
        <p>Chưa có lời nhắn nào. Hãy là người đầu tiên!</p>
        <?php else: ?>
        <?php foreach ($messages as $msg): ?>
        <div class="message">
            <span class="date"><?php echo date("d/m/Y H:i", strtotime($msg['created_at'])); ?></span>
            <strong><?php echo htmlspecialchars($msg['name']); ?></strong>
            <p><?php echo nl2br(htmlspecialchars($msg['message'])); ?></p>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

    </div>

</body>

</html>