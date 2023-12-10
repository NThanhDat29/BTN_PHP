<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    form {
      text-align: center;
      display: inline-block;
      width: 100%;

    }
    .registration-table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }

    .registration-table th,
    .registration-table td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    .registration-table th {
      text-align: left;
      background-color: #f2f2f2;
    }

    .registration-td {
      text-align: center;
    }

    .input-field {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: none;
      border-radius: 4px;
      background-color: #f8f8f8;
    }

    .input-field:focus {
      background-color: #fff;
      box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.1);
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }

    .form-header {
      text-align: center;
      margin-top: 20px;
      margin-bottom: 40px;
    }

    .submit-button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
    }

    .submit-button:hover {
      background-color: #45a049;
    }

    .submit-button:active {
      background-color: #3e8e41;
    }

    </style>
</head>
<body>
<?php
$error = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $username = $_POST["username"];
    $phone_number = $_POST["phone_number"];
    $gender = $_POST["gender"];
    
    // Kiểm tra họ và tên không có chữ
    if (!preg_match("/^[^\d]+$/", $fullname)) {
        $error[] = "Full Name không được có chứa chữ số";
    }

    // Kiểm tra định dạng email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Sai định dạng email";
    }

    // Kiểm tra mật khẩu
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $error[] = "Password phải có ít nhất 8 kí tự bao gồm chữ cái in thường, chữ cái in hoa, chữ số và kí tự đặc biệt";
    }

    // Kiểm tra mật khẩu xác nhận
    if ($password != $confirm_password) {
        $error[] = "Xác nhận mật khẩu không khớp";
    }

    // Kiểm tra số điện thoại không có chữ
    if (!preg_match("/^[0-9]+/",$phone_number)) {
        $error[] = "Phone Number không được có chứa chữ cái";
    }

    // Kiểm tra ô không được bỏ trống
    if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password) || empty($username) || empty($phone_number) || empty($gender)) {
        $error[] = "Thông tin không được bỏ trống";
    }

    if (count($error) == 0) {
        echo "Thank $fullname!, please confirm registration in your email: $email";
        exit;
    }
}
?>

<h2 class="form-header">Registration Form</h2> 
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
    <table class="registration-table"> 
        <tr> 
            <td class="registration-td">Full Name:</td> 
            <td class="registration-td"><input type="text" name="fullname" class="input-field" value="<?php echo isset($_POST["fullname"]) ? $_POST["fullname"] : ""; ?>"></td> 
            <td class="registration-td">Username:</td> 
            <td class="registration-td"><input type="text" name="username" class="input-field" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ""; ?>"></td> 
        </tr>
        <tr>
            <td class="registration-td">Email:</td>
            <td class="registration-td"><input type="text" name="email" class="input-field" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>"></td>
            <td class="registration-td">Phone Number:</td>
            <td class="registration-td"><input type="text" name="phone_number" class="input-field" value="<?php echo isset($_POST["phone_number"]) ? $_POST["phone_number"] : ""; ?>"></td>
        </tr>
        <tr>
            <td class="registration-td">Password:</td>
            <td class="registration-td"><input type="password" name="password" class="input-field"></td>
            <td class="registration-td">Confirm Password:</td>
            <td class="registration-td"><input type="password" name="confirm_password" class="input-field"></td>
        </tr>
        <tr>
            <td class="registration-td">Gender:</td>
            <td class="registration-td" colspan="3">
                <input type="radio" name="gender" value="male" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == "male") ? "checked" : ""; ?>> Male
                <input type="radio" name="gender" value="female" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == "female") ? "checked" : ""; ?>> Female
                <input type="radio" name="gender" value="prefer_not_to_say" <?php echo (isset($_POST["gender"]) && $_POST["gender"] == "prefer_not_to_say") ? "checked" : ""; ?>> Prefer not to say
            </td>
        </tr>
        
            
    </table>
    <input type="submit" name="submit" value="Submit" class="submit-button">


</form> <br> <?php if (count($error) > 0) { echo "<div class='error'><ul>"; foreach ($error as $error_msg) { echo "<li>$error_msg</li>"; } echo "</ul></div>"; } ?> </body> </html> 
