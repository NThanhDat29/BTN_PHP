<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÍNH TIỀN ĐIỆN</title>
    <style>
		form {
    
    border: 1px solid #ccc;
    padding: 20px;
    margin: 20px auto;
    max-width: 500px;
    font-family: Arial, sans-serif;
    }

    table {
    width: 100%;
    border-collapse: collapse;
    }

    th {
    
    text-align: center;
    padding: 10px;
    }

    td {
    padding: 10px;
    }

    input[type="text"], input[type="number"] {
    width: 80%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    }

    input[type="submit"]:hover {
    background-color: #45a049;
    }

    .error {
    color: red;
    text-align: center;
    font-weight: bold;
    }
	</style>
</head>
<body>
    <?php
        $gia=200000;
        $error = "";
        if(isset($_POST['submit'])){
            $ten = $_POST['ten'];
            $cscu = $_POST['cscu'];
            $csmoi = $_POST['csmoi'];
            $gia = $_POST['gia'];
            if(!is_numeric($cscu) || !is_numeric($csmoi) || !is_numeric($gia)){
                $error = "Vui lòng nhập số!";
            } else if($cscu <= 0 || $csmoi <= 0 || $gia <= 0){
                $error = "Vui lòng nhập số dương!";
            } else if($cscu >= $csmoi){
                $error = "Chỉ số mới phải lớn hơn chỉ số cũ!";
            } else if($cscu == 0 || $csmoi == 0){
                $error = "Chỉ số không được nhập số 0!";
            } else {
                $thanhtoan = ($csmoi - $cscu)* $gia;
            }
        }
    ?>
    <form method="post">
        <table style="background: beige">
            <tr style="background: pink">
                <th colspan="2">
                    THANH TOÁN TIỀN ĐIỆN
                </th>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td>
                    <input type="text" name="ten" size="20" value="<?php 
                        if(isset($ten)) echo $ten;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td>
                    <input type="text" name="cscu" size="20" value="<?php 
                        if(isset($cscu)) echo $cscu;
                    ?>"> (Kw)
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td>
                    <input type="text" name="csmoi" size="20" 
                    value="<?php 
                        if(isset($csmoi)) echo $csmoi;
                    ?>"> (Kw)
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="text" name="gia" size="20" 
                    value="<?php 
                        if(isset($gia)) echo $gia;
                    ?>"> (VNĐ)
                </td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td>
                    <input type="text" name="thanhtoan" size="20" readonly style="background: pink"
                    value="<?php 
                        if(isset($thanhtoan)) echo $thanhtoan;
                    ?>"> (VNĐ)
                </td>
            </tr>
            <?php if($error != "") { ?>
            <tr>
                <td colspan="2" style="color: red; text-align: center">
                    <?php echo $error; ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="submit" name="submit" value="Tính">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>