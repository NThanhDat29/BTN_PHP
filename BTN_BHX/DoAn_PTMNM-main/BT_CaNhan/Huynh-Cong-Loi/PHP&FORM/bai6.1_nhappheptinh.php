<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phép Tính</title>
    <style>
        /* CSS cho form */
        body {
            background-color: #F0F0F0;
        }

        table {
            margin: 50px auto;
            border-collapse: collapse;
            background-color:honeydew;
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
    </style>
</head>
<body>
    <form action="bai6.2_ketquapheptinh.php" method="post">
        <table align="center">
            <tr>
                <td colspan="2"><h1>Phép tính trên hai số</h1></td>
            </tr>
            <tr  style="color: red;">
                <td>Chọn phép tính: </td>
                <td>
                    <input type="radio" name="operation" value="add"> Cộng
                    <input type="radio" name="operation" value="subtract"> Trừ
                    <input type="radio" name="operation" value="multiply"> Nhân
                    <input type="radio" name="operation" value="divide"> Chia
                </td>
            </tr>
            <tr>
                <td style="color: blue;">Số thứ nhất: </td>
                <td><input type="text" name="num1"></td>
            </tr>
            <tr>
                <td style="color: blue;">Số thứ hai: </td>
                <td><input type="text" name="num2"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>
