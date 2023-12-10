<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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

        input[type="radio"] {
            margin-right: 5px;
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

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
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

if (isset($_GET['submit'])) {
    // Kiểm tra các trường dữ liệu có giá trị không
    if (empty($_GET['fullname']) || empty($_GET['username']) || empty($_GET['email']) || empty($_GET['phone']) || empty($_GET['password']) || empty($_GET['confirmPassword']) || empty($_GET['gender'])) {
        $msg = "Vui lòng nhập đầy đủ thông tin";
    } else {
    $fullname = $_GET['fullname'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $password = $_GET['password'];
    $confirmPassword = $_GET['confirmPassword'];
    $gender = $_GET['gender'];

    // Kiểm tra tính hợp lệ của dữ liệu và thực hiện thao tác INSERT
    if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        if (preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W]).{8,}$/", $password)) {
            if ($password === $confirmPassword) {
                // Kiểm tra email đã tồn tại trong cơ sở dữ liệu hay chưa
                $query = "SELECT * FROM dangky WHERE email='$email'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {
                    $msg = "Đăng ký không thành công. Email đã tồn tại.";
                } else {
                    // Hash mật khẩu
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO dangky (fullname, username, email, phone, password, gender)
                            VALUES ('$fullname', '$username', '$email', '$phone', '$hashedPassword', '$gender')";
                    if (mysqli_query($connection, $sql)) {
                        $msg = "Đăng ký thành công.<br> Full Name: $fullname, Email: $email";
                    } else {
                        $msg = "Lỗi: " . mysqli_error($connection);
                    }
                }
            } else {
                $msg = "Xác nhận mật khẩu không khớp";
            }
        } else {
            $msg = "Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, chữ số và ký tự đặc biệt";
        }
    } else {
        $msg = "Email không hợp lệ";
    }
    }
}

// Đóng kết nối
mysqli_close($connection);
?>

    <form action="">
        <h3>Registration</h3>
        <table>
            <tr>
                <td>Full Name<br>
                    <input type="text" name="fullname" value="<?php 
                        if(isset($_GET['submit']))
                            if(!empty($_GET['fullname'])) echo $_GET['fullname'];
                    ?>">
                </td>
                <td>
                    Username<br>
                    <input type="text" name="username" value="<?php 
                        if(isset($_GET['submit']))
                            if(!empty($_GET['username'])) echo $_GET['username'];
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Email<br>
                    <input type="text" name="email" value="<?php 
                        if(isset($_GET['submit']))
                            if(!empty($_GET['email'])) echo $_GET['email'];
                    ?>">
                </td>
                <td>
                    Phone Number<br>
                    <input type="text" name="phone" value="<?php 
                        if(isset($_GET['submit']))
                            if(!empty($_GET['phone'])) echo $_GET['phone'];
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Password<br>
                    <input type="password" name="password" value="<?php 
                        if(isset($_GET['submit']))
                            if(!empty($_GET['password'])) echo $_GET['password'];
                    ?>">
                </td>
                <td>Confirm Password<br>
                    <input type="password" name="confirmPassword" value="<?php 
                        if(isset($_GET['submit']))
                            if(!empty($_GET['confirmPassword'])) echo $_GET['confirmPassword'];
                    ?>">
                </td>
            </tr>
            <tr>
            <td>
                Gender
                <br>
                <label><input type="radio" name="gender" value="male" <?php 
                    if(isset($_GET['submit']) and $_GET['gender'] === "male") {
                        echo "checked";
                    }
                ?>> Male</label>
                <label><input type="radio" name="gender" value="female" <?php 
                    if(isset($_GET['submit']) and $_GET['gender'] === "female") {
                        echo "checked";
                    }
                ?>> Female</label>
                <label><input type="radio" name="gender" value="not" <?php 
                    if(isset($_GET['submit']) and $_GET['gender'] === "not") {
                        echo "checked";
                    }
                ?>> Prefer not to say</label>
            </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Register" class="submit-button">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="error-message">
                   
                    <?php
                        if(isset($msg)) echo $msg;
                    ?>
                </td>
            </tr>
        </table>
    </form>

    <div class="login-link">
        Already have an account? <a href="login.php">Log in</a>
    </div>
</body>
</html>