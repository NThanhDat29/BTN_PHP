<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Năm Âm Lịch và Con Giáp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #33ccff;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: white;
            margin-top: 0;
            padding-top: 10px;
        }

        table {
            width: 100%;
        }

        th {
            background-color: darkblue;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 5px;
            border-radius: 3px;
            border: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        img {
            display: block;
            margin: 20px auto;
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        $namDuongLich = $_POST['nam'];
        $mang_can = array("Quý", "Giáp", "Át", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
        $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
        $mang_hinh = array("hoi.webp", "ti.webp", "suu.webp", "dan.webp", "mao.webp", "thin.webp", "ty.webp", "ngo.webp", "mui.webp", "than.webp", "dau.webp", "tuat.webp");

        $nam_am = $namDuongLich - 3;
        $can = $nam_am % 10;
        $chi = $nam_am % 12;
        $nam_am_lich = $mang_can[$can] . " " . $mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
        $hinh_anh = $hinh;
    }
    ?>
    <form method="post" action="">
        <table align="center" style="background-color: #33CCFF;">
            <tr style="background-color: darkblue;">
                <th colspan="2" style="color: white;">TÍNH NĂM ÂM LỊCH</th>
            </tr>
            <tr>
                <td>Năm Dương Lịch: </td>
                <td>
                    <input type="number" name="nam" required value="<?php if(isset($namDuongLich)) echo $namDuongLich; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" size="15" value="⇓" /></td>
            </tr>
            <tr>
                <td>Năm âm lịch:</td>
                <td><input type="text" name="nam_am_lich" size="15" readonly style="background:lightgoldenrodyellow; color: red;" value="<?php echo isset($nam_am_lich) ? $nam_am_lich : ''; ?> " /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <img src="anhs/<?php echo $hinh_anh ?>" width="200px" alt="">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>