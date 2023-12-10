<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f7f7f7;
        }

        h3 {
            text-align: center;
        }

        table {
            width: 100%;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: cornflowerblue;
            color: white;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #4e8cff;
        }

        .error-message {
            text-align: center;
            color: red;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            text-decoration: none;
            color: cornflowerblue;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form_db";

    // Kết nối tới cơ sở dữ liệu
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if (!$connection) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    $msg = ""; // Khởi tạo thông báo rỗng

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Kiểm tra tính hợp lệ của dữ liệu và thực hiện truy vấn SELECT
        if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            $sql = "SELECT * FROM dangky WHERE email = '$email'";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];
                if (password_verify($password, $hashedPassword)) {
                    $username = $row['username'];
                    // Chuyển hướng đến trang chào mừng và truyền tên người dùng qua tham số URL
                    header("Location: welcome.php?username=" . urlencode($username));
                    exit(); // Kết thúc tại đây để ngăn chặn thực thi mã tiếp theo
                } else {
                    $msg = "Sai email hoặc mật khẩu";
                }
            } else {
                $msg = "Sai email hoặc mật khẩu";
            }
        } else {
            $msg = "Email không hợp lệ";
        }
    }

    // Đóng kết nối
    mysqli_close($connection);
    ?>

    <form action="" method="POST">
        <h3>Login</h3>
        <table>
            <tr>
                <td>Email<br>
                    <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>Password<br>
                    <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Login" class="submit-button">
                </td>
            </tr>
            <tr>
                <td class="error-message">
                    <?php echo $msg; ?>
                </td>
            </tr>
        </table>
    </form>

    <div class="register-link">
        Don't have an account? <a href="bai2_form.php">Register</a>
    </div>
</body>
</html>