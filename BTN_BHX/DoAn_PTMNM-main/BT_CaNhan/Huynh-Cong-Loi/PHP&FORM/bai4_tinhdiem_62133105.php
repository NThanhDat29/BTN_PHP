<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KẾT QUẢ THI ĐẠI HỌC</title>
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
        $error = "";
        if(isset($_POST['submit'])){
            $toan= $_POST['toan'];
            $ly = $_POST['ly'];
            $hoa = $_POST['hoa'];
            $diemchuan = $_POST['diemchuan'];
            if(!is_numeric($toan) || !is_numeric($ly) || !is_numeric($hoa) || !is_numeric($diemchuan)){
                $error = "Vui lòng nhập số!";
            }  else if($diemchuan <=0){
                $error = "Điểm chuẩn không được nhập số 0!";
            }else if($toan > 10 || $ly > 10|| $hoa > 10){
                $error = "Điểm không được quá điểm 10!";
            } else {
                $tongdiem = $toan + $ly + $hoa;
                if($toan == 0 || $ly == 0 || $hoa == 0){
                    $ketqua = "Rớt!";
                }else if($tongdiem <= $diemchuan){
                    $ketqua = "Rớt!";
                } else {
                    $ketqua = "Đậu!";
                }

            }
        }
    ?>
    <form method="post">
        <table style="background: pink">
            <tr style="background:deeppink">
                <th colspan="2">
                    KẾT QUẢ THI ĐẠI HỌC
                </th>
            </tr>
            <tr>
                <td>Toán:</td>
                <td>
                    <input type="text" name="toan" size="20" value="<?php 
                        if(isset($toan)) echo $toan;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Lý:</td>
                <td>
                    <input type="text" name="ly" size="20" value="<?php 
                        if(isset($ly)) echo $ly;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Hóa:</td>
                <td>
                    <input type="text" name="hoa" size="20" 
                    value="<?php 
                        if(isset($hoa)) echo $hoa;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Điểm chuẩn:</td>
                <td>
                    <input type="text" name="diemchuan" size="20" style="color: red"
                    value="<?php 
                        if(isset($diemchuan)) echo $diemchuan;
                    ?>"> 
                </td>
            </tr>
            <tr>
                <td>Tổng điểm:</td>
                <td>
                    <input type="text" name="tongdiem size="20" readonly style="background: beige"
                    value="<?php 
                        if(isset($tongdiem)) echo $tongdiem;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả thi:</td>
                <td>
                    <input type="text" name="ketqua size="20" readonly style="background: beige"
                    value="<?php 
                        if(isset($ketqua)) echo $ketqua;
                    ?>">
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
                    <input type="submit" name="submit" value="Xem kết quả">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>