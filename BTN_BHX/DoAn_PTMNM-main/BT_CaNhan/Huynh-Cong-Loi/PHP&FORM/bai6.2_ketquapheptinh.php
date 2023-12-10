<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Phép Tính</title>
    <style>
        /* CSS cho form */
        body {
            background-color: #F0F0F0;
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
        }

        h1 {
            text-align: center;
            color: #0066FF;
            padding: 20px;
            margin: 0;
        }

        input[type="radio"], input[type="text"], input[type="submit"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #CCCCCC;
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
</head>
<body>
    <?php
    if (isset($_POST['operation']) && isset($_POST['num1']) && isset($_POST['num2'])) {
        $operation = $_POST['operation'];
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        
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
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                    $operationText = 'Chia';
                } else {
                    $result = 'Không thể chia cho 0';
                    $operationText = 'Chia';
                }
                break;
            default:
                $result = 'Phép tính không hợp lệ';
                $operationText = 'Không xác định';
        }
    } else {
        echo "<p>Không có đủ thông tin để thực hiện phép tính.</p>";
    }
    ?>
    <form action="bai6.2_ketquapheptinh.php" method="post">
        <table align="center">
            <tr>
                <td colspan="2"><h1>Kết quả phép tính</h1></td>
            </tr>
            <tr  style="color: red;">
                <td>Phép tính đã chọn: </td>
                <td> <?php if (isset($operationText)) echo $operationText;?></td>
            </tr>
            <tr>
                <td style="color: blue;">Số thứ nhất: </td>
                <td><input type="text" name="num1" readonly value="<?php if (isset($num1)) echo $num1;?>"></td>
            </tr>
            <tr>
                <td style="color: blue;">Số thứ hai: </td>
                <td><input type="text" name="num2" readonly value="<?php if (isset($num2)) echo $num2;?>"></td>
            </tr>
            <tr>
            <td style="color: blue;">Kết quả: </td>
                <td><input type="text"  readonly value="<?php if (isset($result)) echo $result;?>"></td>
            </tr>
            <tr>
               <td > <a style="color: #CC66FF" href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
            </tr>
        </table>
    </form>

</body>
</html>
