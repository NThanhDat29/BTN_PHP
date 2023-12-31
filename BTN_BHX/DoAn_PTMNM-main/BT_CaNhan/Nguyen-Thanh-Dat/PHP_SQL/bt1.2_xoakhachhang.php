<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Xoá khách hàng</title>
  <style>
    table {
      background: lightgreen;

    }

    td {
      padding: 6px;
    }
  </style>
</head>

<body>
  <?php
  $com = mysqli_connect('localhost', 'root', '', 'quanly_bansua')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());
  mysqli_set_charset($com, 'UTF8');
  $Ma_KH = isset($_GET['maKH']) ? $_GET['maKH'] : '';
  $SQL =
    "SELECT Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email     
  from khach_hang
  WHERE Ma_khach_hang='$Ma_KH'";
  $query = mysqli_query($com, $SQL);
  $row = mysqli_fetch_assoc($query);

  ?>
  <form action="" method="post">
    <!-- enctype="multipart/form-data" -->
    <table style="width: 50%;" align="center">
      <tr>
        <th colspan="2" align="center" bgcolor="green" style="color: white;">
          <div style="padding: 20px; font-size: 20px;" class="text-center">BẠN CÓ CHẮC XÓA KHÁCH HÀNG NÀY?</div>
        </th>
      </tr>
      <tr>
        <td>Mã khách hàng: </td>
        <td>
          <input type="text" disabled name="maKH" value="<?php echo $row['Ma_khach_hang'] ?>">
        </td>
      </tr>
      <tr>
        <td>Tên khách hàng: </td>
        <td>
          <input type="text" disabled name="tenKH" value="<?php echo $row['Ten_khach_hang'] ?>">
        </td>
      </tr>
      <tr>
        <td>Phái: </td>
        <td>
          <input type="radio" disabled name="gtKH" value="0" <?php if ($row['Phai'] == 0) echo 'checked'; ?>>Nam
          <input type="radio" disabled name="gtKH" value="1" <?php if ($row['Phai'] == 1) echo 'checked'; ?>>Nữ
        </td>
      </tr>
      <tr>
        <td>Địa chỉ: </td>
        <td>
          <input type="text" disabled name="diachiKH" value="<?php echo $row['Dia_chi'] ?>">
        </td>
      </tr>
      <tr>
        <td>Điện thoại: </td>
        <td>
          <input type="text" disabled name="dienthoaiKH" value="<?php echo $row['Dien_thoai'] ?>">
        </td>
      </tr>
      <tr>
        <td>Email: </td>
        <td>
          <input type="text" disabled name="emailKH" value="<?php echo $row['Email'] ?>">
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input class="btn btn-danger" name="delete" type="submit" value="Xóa">
          <a class="btn btn-secondary" href="bt2.12.php">Quay lại</a>
        </td>
      </tr>
    </table>
  </form>
  <?php
  if (isset($_POST['delete'])) {
    $Ma_KH = $_GET['maKH'];
    $sql =
      "DELETE FROM khach_hang
      WHERE Ma_khach_hang = '$Ma_KH'";
    if (mysqli_query($com, $sql)) {
      echo "Xóa thành công!";
      header('location: bt2.12.php');
    } else { //Lỗi
      $result = "Lỗi xóa" . mysqli_error($com);
    }
  }
  ?>
</body>

</html>