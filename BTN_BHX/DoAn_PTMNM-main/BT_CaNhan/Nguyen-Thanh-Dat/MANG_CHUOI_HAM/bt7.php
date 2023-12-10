<!DOCTYPE html>
<html lang="en">

<head>
  <title>Năm âm lịch</title>
  <style>
    table {
      background-color: lightgreen;
    }

    table th {
      background-color: seagreen;
      color: white;
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
    $mang_hinh = array("heo.jpg", "chuot.jpg", "trau.jpg", "ho.jpg", "meo.jpg", "rong.jpg", "ran.jpg", "ngua.jpg", "de.jpg", "khi.jpg", "ga.jpg", "cho.jpg");
    $nam = $nam - 3;
    $can = $nam % 10;
    $chi = $nam % 12;
    $nam_al = $mang_can[$can];
    $nam_al = $nam_al . " " . $mang_chi[$chi];
    $hinh = $mang_hinh[$chi];
    $hinh_anh = "<img src='images/$hinh' alt='Images' width='200' >";
  }
  ?>
  <form action="" method="post">
    <table align="center">
    <tr>
        <th colspan="15" style="text-align: center;">
            <h3>Tìm kiếm</h3>
        </th>
    </tr> 
    <tr>
        <td style="text-align: center;">Năm dương lịch:</td>
        <td><input type="text" name="nam" value="<?php if (isset($_POST['nam'])) echo $nam + 3; ?>" /></td>
        <td style="text-align: center;"></td>
        <td><input type="submit" name="tinh" size="15" value="=>" /></td>
        <td style="text-align: center;">Năm âm lịch:</td>
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