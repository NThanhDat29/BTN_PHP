<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Thông tin khách hàng</title>
  <style>
    table {
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: blanchedalmond;
    }
    th {
      color:burlywood; 
    }
  </style>
</head>

<body>
  <?php
  $servername ="localhost";
    $username ="root";
    $password="";
    $dbname="quanly_bansua";
    $com = mysqli_connect($servername, $username, $password, $dbname);
    if(!$com){
        die("Connection failed: " . mysqli_connect_error());
    }else echo "-->thanh cong";
  $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang';
  $result = mysqli_query($com, $sql);
  echo "<p align='center'><font size='5' color='black'><b>THÔNG TIN KHÁCH HÀNG</b></font></P>";
  echo "<table align='center' width='90%' border='1' cellpadding='2' cellspacing='2' >";
  echo '<tr>
    <th width="50">Mã khách hàng</th>
    <th width="150">Tên khách hàng</th>
    <th width="200">Giới tính</th>
    <th width="200">Địa chỉ</th>
    <th width="200">Điện thoại</th>
    <th width="200">Email</th>
</tr>';

if (mysqli_num_rows($result) <> 0) {
    while ($rows = mysqli_fetch_row($result)) {
      if ($rows[2] == 1) {
        $rows[2] = "nu";
      } else
        $rows[2] = "nam";
      echo "<tr>";
      echo "<td>$rows[0]</td>";
      echo "<td>$rows[1]</td>";
      echo "<td><img src='./gioitinh/$rows[2].png' alt='Nữ' width='30px' height='30px'></td>";
      echo "<td>$rows[3]</td>";
      echo "<td>0$rows[4]</td>";
      echo "<td>$rows[5]</td>";
      echo "</tr>";
    }
  }
  echo "</table>";

  