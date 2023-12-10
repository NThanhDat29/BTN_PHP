<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #F0F0F0;
    }

    form {
      margin: 50px auto;
      max-width: 500px;
      padding: 20px;
      background-color: bisque;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    fieldset {
      border: none;
      padding: 0;
      margin: 0;
    }

    legend {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
    }

    td {
      padding: 10px;
    }

    input[type="text"],
    input[type="submit"],
    input[type="reset"],
    textarea,
    select {
      width: 100%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #CCCCCC;
      font-size: 16px;
    }

    input[type="radio"],
    input[type="checkbox"] {
      margin-right: 5px;
    }

    input[type="submit"],
    input[type="reset"] {
      padding: 10px 20px;
      background-color: #0066FF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 5px;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #003399;
    }

    textarea {
      resize: vertical;
    }
  </style>
  <title>THÔNG TIN ĐƯỢC XỬ LÝ</title>
</head>

<body>
  <?php
  $name = $_POST['name'];
  $address =  $_POST['address'];
  $telephone = $_POST['telephone'];
  $gender =  $_POST['gender'];
  $nationality = $_POST['nationality'];
  $note =  $_POST['note'];
  if (empty($_POST['name'])) {
    echo 'Vui lòng nhập tên của bạn';
    echo '<a href="javascript:window.history.back(-1);"><br>Trở về trang trước</a>';
    exit;
  }

  // Kiểm tra xem địa chỉ có trống không
  if (empty($_POST['address'])) {
    echo 'Vui lòng nhập địa chỉ của bạn';
    echo '<a href="javascript:window.history.back(-1);">Trở về trang trước</a>';
    exit;
  }


  // Kiểm tra xem số điện thoại có đúng định dạng không
  if (!preg_match('/^\d{10}$/', $_POST['telephone'])) {
    echo 'Vui lòng nhập số điện thoại hợp lệ';
    echo '<a href="javascript:window.history.back(-1);">Trở về trang trước</a>';
    exit;
  }
  ?>
  <div>
    <h2>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</h2>
    <form action="th8.php" method="post">
      <div class="container">
        <table>
          <tr>
            <td align="left">Họ tên:</td>
            <td><?php echo $name ?></td>
          </tr>
          <tr>
            <td align="left">Địa chỉ:</td>
            <td><?php echo $address ?></td>
          </tr>
          <tr>
            <td align="left">Số điện thoại:</td>
            <td><?php echo $telephone ?></td>
          </tr>
          <tr>
            <td align="left">Giới tính:</td>
            <td><?php echo $gender ?></td>
          </tr>
          <tr>
            <td align="left">Quốc tịch:</td>
            <td><?php echo $nationality ?></td>
          </tr>
          <tr>
            <td align="left">Các môn đã học:</td>
            <td><?php
                if (isset($_POST['sub1'])) echo  $_POST['sub1'] . ",";
                if (isset($_POST['sub2'])) echo  $_POST['sub2'] . ",";
                if (isset($_POST['sub3'])) echo  $_POST['sub3'] . ",";
                if (isset($_POST['sub4'])) echo  $_POST['sub4'];
                ?></td>
          </tr>
          <tr>
            <td align="left">Ghi chú:</td>
            <td><?php echo $note ?></td>
          </tr>
        </table>
      </div>
    </form>
    <div><a href="javascript:window.history.back(-1);">Trở về trang trước</a></div>
  </div>
</body>

</html>