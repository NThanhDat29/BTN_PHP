<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sắp xếp mảng</title>
</head>

<body>
  <?php
  function Swap(&$a, &$b)
  {
    $tam = $a;
    $a = $b;
    $b = $tam;
  }

  function Sapxeptang($arr)
  {
    for ($i = 0; $i < count($arr); $i++) {
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] > $arr[$j]) {
          Swap($arr[$i], $arr[$j]);
        }
      }
    }
    return $arr;
  }

  function Sapxepgiam($arr)
  {
    for ($i = 0; $i < count($arr); $i++) {
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] < $arr[$j]) {
          Swap($arr[$i], $arr[$j]);
        }
      }
    }
    return $arr;
  }

  $arr = "";
  $tang = "";
  $giam = "";

  if (isset($_POST['arr'])) {
    $arr = $_POST['arr'];
    // Kiểm tra xem chuỗi nhập vào có chứa các số hợp lệ và ngăn cách bởi dấu phẩy không
    if (preg_match('/^[\d,]+$/', $arr)) {
      $array = explode(",", $arr);
      $tang = implode(",", Sapxeptang($array));
      $giam = implode(",", Sapxepgiam($array));
    } else {
      echo "<p style='color: red;'>Nhập mảng không hợp lệ.</p>";
    }
  }
  ?>
  <form action="" method="post">
  <table align="center" style="background-color: #00cccc;">
        <tr style="background-color: #009999;">
                <th colspan="2">SẮP XẾP MẢNG</th>
            </tr>
      </thead>
        <td>Nhập mảng :</td>
        <td><input type="text" name="arr" value="<?php echo $arr; ?>" size="20" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="sapxep" value="Sắp xếp tăng/giảm " /></td>
      </tr>
      <tr>
        <td>Sau khi sắp xếp:</td>
        <td></td>
      </tr>
      <tr>
        <td>Tăng dần:</td>
        <td><input type="text" name="tang" disabled="disabled" value="<?php echo $tang; ?>" size="20" /></td>
      </tr>
      <tr>
        <td>Giảm dần :</td>
        <td><input type="text" name="giam" disabled="disabled" value="<?php echo $giam; ?>" size="20" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><label>(Các phần tử trong mảng được ngăn cách bởi dấu phẩy)</label></td>
      </tr>
    </table>
  </form>
</body>

</html>