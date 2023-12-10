<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay Thế Dãy Số</title>
</head>
<body>
<?php
function convertStringToArray($inputString) {
    return explode(",", $inputString);
}

function replaceArrayValues($array, $valueToReplace, $replacementValue) {
    return array_map(function($element) use ($valueToReplace, $replacementValue) {
        return $element == $valueToReplace ? $replacementValue : $element;
    }, $array);
}

if(isset($_POST['replace'])){
    $ds = $_POST['ds'];
    $valueToReplace = $_POST['valueToReplace'];
    $replacementValue = $_POST['replacementValue'];
    $pattern = '/^-?\d+(?:\s*,\s*-?\d+)*$/'; // Chỉnh sửa regex pattern để cho phép số âm và dấu cách trước/sau số
    // Kiểm tra dãy số chỉ chứa số
    if (preg_match($pattern, $ds)) {
        $ds = trim($ds); // Loại bỏ các dấu cách không cần thiết
        $mangCu = convertStringToArray($ds);
        $mangMoi = replaceArrayValues($mangCu, $valueToReplace, $replacementValue);
    } else {
        $mangCu = [];
        $mangMoi = [];
        $error = "Dãy số chỉ được chứa số, không được chứa chữ cái.";
    }
}
?>
    <form method="post" action="bai5_mangthaythe.php">
        <table align="center">
            <tr style="background-color: #CC0099">
                <th colspan="2" style="color: white;">THAY THẾ</th>
            </tr>
            <?php if (isset($error)): ?>
            <tr>
                <td colspan="2">
                    <p style="color: red;"><?php echo $error; ?></p>
                </td>
            </tr>
            <?php endif; ?>
            <tr style="background-color: pink">
                <td>Nhập các phần tử: </td>
                <td>
                    <input type="text" name="ds" size="30" required value="<?php if(isset($ds)) echo $ds; ?>">
                </td>
            </tr>
            <tr style="background-color: pink">
                <td>Giá trị cần thay thế: </td>
                <td>
                    <input type="text" name="valueToReplace" size="10" required value="<?php if(isset($valueToReplace)) echo $valueToReplace; ?>">
                </td>
            </tr>
            <tr style="background-color: pink">
                <td>Giá trị thay thế: </td>
                <td>
                    <input type="text" name="replacementValue" size="10" required value="<?php if(isset($replacementValue)) echo $replacementValue; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="replace" readonly style="background-color: yellow;" value="Thay thế">
                </td>
            </tr>
            <?php if (isset($mangCu) && isset($mangMoi)): ?>
            <tr>
                <td>Mảng cũ: </td>
                <td>
                    <input type="text" name="mangCu" size="30" readonly style="background:#FFA07A" value="<?php echo implode(", ", $mangCu); ?>">
                </td>
            </tr>
            <tr>
                <td>Mảng mới: </td>
                <td>
                    <input type="text" name="mangMoi" size="30" readonly style="background:#FFA07A" value="<?php echo implode(", ", $mangMoi); ?>">
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2">
                    <p>(<span style="color: red;">Ghi chú:</span>Các phần tử sẽ được cách nhau bằng dấu ",")</p>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>