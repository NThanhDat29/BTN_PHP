<!DOCTYPE html>
<html lang="en">

<head>
  <title>Phép toán</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <title>Trang Kết Quả</title>
</head>

<body>
  <?php
    $a = $_POST['a'];
    $b = $_POST['b'];
    if (is_numeric($a) == false || is_numeric($b) == false) {
      echo "Chưa nhập số hoặc nhập không phải là số!";
      $pt = $_POST['pt'];
      $c = "";
    } else {
      switch ($_POST['pt']) {
        case "cong":
          $pt = "Cộng";
          $c = $a + $b;
          break;
        case "tru":
          $pt = "Trừ";
          $c = $a - $b;
          break;
        case "nhan":
          $pt = "Nhân";
          $c = $a * $b;
          break;
        case "chia":
          $pt = "Chia";
          if ($b != 0)
            $c = $a / $b;
          else {
            echo 'Số thứ 2 phải khác 0!';
            $pt = $_POST['pt'];
            $c = "";
          }
          break;
      }
    }
    if (is_float($c) || is_double($c)) {
      $c = number_format($c, 2);
    }
  ?>
  <form action="bt6.php" method="post">
    <table style="background-color: beige;" align="center">
      <thead>
        <th colspan="5" align="center">
          <h3 style="color: darkcyan;">PHÉP TÍNH ĐÃ TÍNH</h3>
        </th>
      </thead>
      <tr>
        <td>
          <font color='brown'>Chọn phép tính:</font>
        </td>
        <td colspan="4">
          <input type="text" style="background: none; border: none;" disabled name="pt" value="<?php echo $pt; ?>">
        </td>
      </tr>
      <tr>
        <td>
          <font color='blue'>Số thứ 1:</font>
        </td>
        <td colspan="4">
          <input type="text" disabled name="a" value="<?php echo $a; ?>">
        </td>
      </tr>
      <tr>
        <td>
          <font color='blue'>Số thứ 2:</font>
        </td>
        <td colspan="4">
          <input type="text" disabled name="b" value="<?php echo $b; ?>">
        </td>
      </tr>
      <tr>
        <td>
          <font color='blue'>Két quả:</font>
        </td>
        <td colspan="4">
          <input type="text" disabled name="c" value="<?php echo $c; ?>">
        </td>
      </tr>
      <tr>
        <td></td>
        <td><a href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
      </tr>
    </table>
  </form>
</body>

</html>