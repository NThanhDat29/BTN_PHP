<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Phép Tính</title>
    <style>
        /* CSS cho form */
        body {
            background-color: #F0F0F0;
            font-family: Arial, sans-serif;
        }

        table {
            margin: 50px auto;
            border-collapse: collapse;
            background-color: bisque;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        td, th {
            padding: 10px;
            border: 1px solid #CCCCCC;
        }

        th {
            background-color: #0066FF;
            color: white;
            font-size: 18px;
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #0066FF;
            padding: 20px;
            margin: 0;
        }

        input[type="radio"],
        input[type="text"],
        input[type="submit"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
        }

        input[type="text"][readonly] {
            background-color: #F0F0F0;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #0066FF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #003399;
        }

        input[type="submit"]:focus {
            outline: none;
        }

        td[colspan="2"] {
            text-align: center;
            padding-top: 20px;
        }

        td[style="color: red;"] {
            text-align: center;
            font-weight: bold;
        }

        td[style="color: blue;"] {
            font-weight: bold;
        }

        a {
            color: #CC66FF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
    setTimeout(function() { // Chuyển hướng trở lại trang web nhập dữ liệu sau 3 giây
        window.history.go(-1);
    }, 3000); // 3000 milliseconds = 3 seconds 
</script>
</head>
<body>
    <?php
    if (isset($_POST['operation']) && isset($_POST['num1']) && isset($_POST['num2'])) {
        $operation = $_POST['operation'];
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
    
        // Kiểm tra dữ liệu nhập vào
        if (!is_numeric($num1) || !is_numeric($num2)) {
            $result = 'Dữ liệu không hợp lệ';
            $operationText = '';
            echo "<tr><td colspan='2' style='color: red;'>$result</td></tr>";
        } elseif ($operation == 'divide' && $num2 == 0) {
            $result = 'Không thể chia cho 0';
            $operationText = 'Chia';
            echo "<tr><td colspan='2' style='color: red;'>$result</td></tr>";
        } else {
            // Xử lý phép tính
            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    $operationText = 'Cộng';
                    break;
                case 'subtract':
                    if ($num1 > $num2) {
                        $result = $num1 - $num2;
                        $operationText = 'Trừ';
                    } else {
                        $result = 'Số thứ 1 > số thứ 2';
                        $operationText = 'Trừ';
                    }
                    break;
                    
                case 'multiply':
                    $result = $num1 * $num2;
                    $operationText = 'Nhân';
                    break;
                case 'divide':
                    $result = $num1 / $num2;
                    $operationText = 'Chia';
                    break;
                default:
                    $result = 'Phép tính không hợp lệ';
                    $operationText = 'Không xác định';
            }
        }
    } else {
        echo "<p>Không có đủ thông tin để thực hiện phép tính.</p>";
    }
    ?>
    <form action="bai7_kq.php" method="post">
        <table align="center">
            <tr>
                <td colspan="2"><h1>Kết quả phép tính</h1></td>
            </tr>
            <tr  style="color: red;">
                <td>Phép tính đã chọn:</td>
                <td><?php if (isset($operationText)) echo $operationText;?></td>
            </tr>
            <tr>
                <td style="color: blue;">Số thứ nhất:</td>
                <td><input type="text" name="num1" readonly value="<?php if (isset($num1)) echo $num1;?>"></td>
            </tr>
            <tr>
                <td style="color: blue;">Số thứ hai:</td>
                <td><input type="text" name="num2" readonly value="<?php if (isset($num2)) echo $num2;?>"></td>
            </tr>
            <tr>
            <td style="color: blue;">Kết quả:</td>
                <td><input type="text" readonly value="<?php if (isset($result)) echo number_format($result, 2); ?>"></td>
            </tr>
            
        </table>
    </form>

</body>
</html>