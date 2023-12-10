<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp xếp mảng</title>
</head>
<body>
    <?php
        function ascendingSort($array) {
            $length = count($array);
            for ($i = 0; $i < $length - 1; $i++) {
                for ($j = 0; $j < $length - $i - 1; $j++) {
                    if ($array[$j] > $array[$j + 1]) {
                        // Hoán đổi vị trí
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }
            return $array;
        }
        
        function descendingSort($array) {
            $length = count($array);
            for ($i = 0; $i < $length - 1; $i++) {
                for ($j = 0; $j < $length - $i - 1; $j++) {
                    if ($array[$j] < $array[$j + 1]) {
                        // Hoán đổi vị trí
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }
            return $array;
        }

        if(isset($_POST['submit'])){
            $ds = $_POST['ds'];
            $pattern = '/^-?\d+(?:\s*,\s*-?\d+)*$/'; // Chỉnh sửa regex pattern để cho phép số âm và dấu cách trước/sau số
            // Kiểm tra dãy số chỉ chứa số
            if (preg_match($pattern, $ds)) {
                $ds = trim($ds); // Loại bỏ các dấu cách không cần thiết
                $mang = explode(",", $ds);
                $tangDan = ascendingSort($mang);
                $giamDan = descendingSort($mang);
            } else {
                $mang = [];
                $tangDan = [];
                $giamDan = [];
                $error = "Dãy số chỉ được chứa số, không được chứa chữ cái.";
            }
        }
    ?>
    <form method="post" action="bai6_mangsapxep.php">
        <table align="center" style="background-color: #D1DED4">
            <tr style="background-color: #309B95;">
                <th colspan="2" style="color: white;">SẮP XẾP MẢNG</th>
            </tr>
            <?php if (isset($error)): ?>
            <tr>
                <td colspan="2">
                    <p style="color: red;"><?php echo $error; ?></p>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>Nhập dãy số: </td>
                <td>
                    <input type="text" name="ds" size="25" required value="<?php if(isset($ds)) echo $ds; ?>"><span style="color: red">(*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="submit" readonly style="background-color: lightblue;" value="Sắp xếp tăng/giảm">
                </td>
            </tr>
            <tr>
                <td style="color: red">Mảng sau khi sắp xếp</td>
            </tr>
            
            <tr style="background-color: #CCE6E7;">
                <td>Mảng tăng dần: </td>
                <td>
                    <input type="text" name="tangdan" size="30" readonly value="<?php if(isset($tangDan)) echo implode(",", $tangDan); ?>">
                </td>
            </tr>
            <tr style="background-color: #CCE6E7;">
                <td>Mảng giảm dần: </td>
                <td>
                    <input type="text" name="giamdan" size="30" readonly value="<?php if(isset($giamDan)) echo implode(",", $giamDan); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="background-color: #D1DED4;">
                    <p ><span style="color: red">(*)</span> (Các phần tử sẽ được cách nhau bằng dấu ",")</p>                    
                </td>
            </tr>
        </table>
    </form>
</body>
</html>