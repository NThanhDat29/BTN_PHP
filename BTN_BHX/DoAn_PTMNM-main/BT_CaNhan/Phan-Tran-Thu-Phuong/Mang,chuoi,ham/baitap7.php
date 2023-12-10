<!DOCTYPE html>
<html lang="en">

<head>
  <title>Năm âm lịch</title>
  <style>
    table {
      background-color: #FFFFCC;
    }

    table th {
      background-color: #FFCC99;
      color: white;
    }

    .fixed-ratio-image {
      width: 200px; /* Đặt chiều rộng cố định cho hình ảnh */
      height: auto; /* Chiều cao tự động tính toán theo tỉ lệ */
    }
</style>

</head>

<body>
  <?php
  if (isset($_POST['nam']))
    $nam = trim($_POST['nam']);
  else $nam = 0;
  $nam_al = "";
  if (isset($_POST['tinh'])) {
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "meo.jpg", "thin.jpg", "ran.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");
    $nam = $nam - 3;
    $can = $nam % 10;
    $chi = $nam % 12;
    $nam_al = $mang_can[$can];
    $nam_al = $nam_al . " " . $mang_chi[$chi];
    $hinh = $mang_hinh[$chi];
    $hinh_anh = "<img src='images/$hinh' alt='Images' class='fixed-ratio-image' >";
  }
  ?>
 <form action="" method="post">
    <table border="0" align="center" cellpadding="0">
      <th colspan="15" style="text-align: center;">
        TÍNH NĂM ÂM LỊCH
      </th>
      <tr>
        <td>Năm dương lịch:</td>
        <td><input type="text" name="nam" value="<?php if (isset($_POST['nam'])) echo $nam + 3; ?>" /></td>
        <td></td>
        <td><input type="submit" name="tinh" size="15" value="=>" /></td>
        <td>Năm âm lịch:</td>
      <td><input type="text" name="nam_al" size="15" readonly value="<?php echo $nam_al; ?> " /></td>
      </tr>
      <tr>
        <td colspan="7" align="center">
            <?php
                if (isset($hinh_anh)) echo $hinh_anh;
            ?>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>