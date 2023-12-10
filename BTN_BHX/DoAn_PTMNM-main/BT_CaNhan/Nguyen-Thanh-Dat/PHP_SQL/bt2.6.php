<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sữa</title>
  <style>
    .item {
      display: flex;
      height: 250px;
      flex-direction: column;
      justify-content: space-between;
    }

    .chitiet {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: start;
    }
    th {
      background-color: coral;
      color: white;
    }
  </style>
</head>

<body>
  <?php
  $com = mysqli_connect('localhost', 'root', '', 'quanly_bansua')
  or die('Could not connect to MySQL: ' . mysqli_connect_error());
  mysqli_set_charset($com, 'UTF8');
  $sql =
    'select Ten_sua,Trong_luong,Don_gia,Hinh
    from sua s 
    join loai_sua ls on s.Ma_loai_sua = ls.Ma_loai_sua';
  $result = mysqli_query($com, $sql);
  echo "<table align='center' width='30%' border='1' style='border-collapse:collapse'>";
  echo "<tr><th align='center' colspan='5'><font size='5'>THÔNG TIN HÃNG SỮA</font></th></tr>"; 

  if (mysqli_num_rows($result) <> 0) {
    $n = 0;
    while ($rows = mysqli_fetch_row($result)) {
      echo "<td align='center' >
              <div class='item'>
                <div class='chitiet'>
                <b>$rows[0]</b>
                $rows[1] gr - $rows[2] VNĐ<br>
                </div>
                <div class='hinh'><img width='150px' src='./Hinh_sua/$rows[3]' alt=''></div>
              </div>
            </td>";
      $n++;
      if ($n % 5 == 0)
        echo "<tr></tr>";
    }
  }
  echo "</table>";
  ?>

</body>

</html>
