<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thêm mới khách hàng</title>
    <style>
        /* Thêm CSS cho form */
        form {
            max-width: 400px;
            margin: auto;
        }

        h2 {
            font-weight: bold;
            color: blue;
            margin-bottom: 10px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }

        .form-container input[type="radio"],
        .form-container label {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }

        .form-container input[type="radio"]:last-child,
        .form-container label:last-child {
            margin-right: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }


        /* ... */
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="banner"> <img src="images/banner_1.jpg" alt="Banner"> </div>
            <div class="nav-menu">
                <div class="nav-menu-item"> <a href="index.php"> <span class="icon">🏠</span> Trang chủ </a> </div>
                <div class="nav-menu-item"> <a href="them_sua.php"> <span class="icon">➕</span> Thêm sữa mới </a> </div>
                <div class="nav-menu-item"> <a href="sua_banchay.php"> <span class="icon">🔥</span> Sữa bán chạy </a> </div>
                <div class="nav-menu-item"> <a href="timkiem_sua.php"> <span class="icon">🔍</span> Tìm kiếm sữa </a> </div>
                <div class="nav-menu-item"> <a href="them_kh.php"> <span class="icon">👥</span> Thêm khách hàng </a> </div>
            </div>
        </div>
        <div class="sidebar-left">
            <div class="banner">
                <img src="images/banner_2.png" alt="Banner 1">
                <img src="images/banner_3.jpg" alt="Banner 2">
                <img src="images/banner_4.jpg" alt="Banner 3">
                <img src="images/banner_2.png" alt="Banner 1">
                <img src="images/banner_3.jpg" alt="Banner 2">
                <img src="images/banner_4.jpg" alt="Banner 3">
            </div>
        </div>
    </div>

    <div class="main-content">
        <h2>Thêm Khách Hàng Mới</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'config.php';

            // Lấy dữ liệu từ form
            $ma_kh = $_POST['ma_kh'];
            $ten_kh = $_POST['ten_kh'];
            $dia_chi = $_POST['dia_chi'];
            $phai = $_POST['phai'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];

            // Thực hiện truy vấn chèn dữ liệu vào cơ sở dữ liệu
            $sql = "INSERT INTO khachhang (MaKH, TenKH, DiaChi, Phai, Email, SDT) 
            VALUES ('$ma_kh', '$ten_kh', '$dia_chi', '$phai', '$email', '$sdt')";

            if (mysqli_query($conn, $sql)) {
                echo "Thêm khách hàng thành công!";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }

            // Đóng kết nối
            mysqli_close($conn);
        }
        ?>

        <div class="form-container">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <?php
                include 'config.php';

                // Lấy mã khách hàng mới nhất
                $sql_latest_ma_kh = "SELECT MAX(MaKH) AS latest_ma_kh FROM khachhang";
                $result_latest_ma_kh = mysqli_query($conn, $sql_latest_ma_kh);
                $row_latest_ma_kh = mysqli_fetch_assoc($result_latest_ma_kh);
                $latest_ma_kh = $row_latest_ma_kh['latest_ma_kh'];
                $next_ma_kh = $latest_ma_kh + 1;

                // Giải phóng bộ nhớ
                mysqli_free_result($result_latest_ma_kh);
                ?>
                <label for="ma_kh">Mã Khách Hàng:</label>
                <input type="text" name="ma_kh" id="ma_kh" value="<?php echo $next_ma_kh; ?>" readonly>

                <label>Phái:</label>
                <input type="radio" name="phai" id="male" value="Nam">
                <label for="male">Nam</label>
                <input type="radio" name="phai" id="female" value="Nữ">
                <label for="female">Nữ</label><br>

                <label for="sdt">Số Điện Thoại:</label>
                <input type="text" name="sdt" id="sdt" required>

                <label for="ten_kh">Tên Khách Hàng:</label>
                <input type="text" name="ten_kh" id="ten_kh" required>

                <label for="dia_chi">Địa Chỉ:</label>
                <input type="text" name="dia_chi" id="dia_chi" required>

                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>

                <input type="submit" value="Thêm mới">
            </form>
        </div>

        <?php
        // Kết nối CSDL
        include 'config.php';

        // Truy vấn lấy thông tin của bảng "khachhang"
        $sql_khachhang = "SELECT * FROM khachhang";
        $result_khachhang = mysqli_query($conn, $sql_khachhang);
        ?>

        <!-- Hiển thị bảng thông tin -->
        <table>
            <thead>
                <tr>
                    <th>Mã Khách Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Phái</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Duyệt qua từng dòng kết quả và hiển thị thông tin
                while ($row_khachhang = mysqli_fetch_assoc($result_khachhang)) {
                    echo '<tr>';
                    echo '<td>' . $row_khachhang['MaKH'] . '</td>';
                    echo '<td>' . $row_khachhang['TenKH'] . '</td>';
                    echo '<td>' . $row_khachhang['DiaChi'] . '</td>';
                    echo '<td>' . $row_khachhang['Phai'] . '</td>';
                    echo '<td>' . $row_khachhang['Email'] . '</td>';
                    echo '<td>' . $row_khachhang['SDT'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

        <?php
        // Giải phóng bộ nhớ
        mysqli_free_result($result_khachhang);
        // Đóng kết nối
        mysqli_close($conn);
        ?>
    </div>

    <div class="sidebar-right">
        <div class="banner">
            <img src="images/banner_2.png" alt="Banner 1">
            <img src="images/banner_3.jpg" alt="Banner 2">
            <img src="images/banner_4.jpg" alt="Banner 3">
            <img src="images/banner_2.png" alt="Banner 1">
            <img src="images/banner_3.jpg" alt="Banner 2">
            <img src="images/banner_4.jpg" alt="Banner 3">
        </div>
    </div>
    </div>
    <div class="footer">
        <p>©️ 2023 HCL M I L K. Tất cả các quyền được bảo lưu.</p>
        <p>Địa chỉ: 234 Nguyễn Đình Chiểu Nha Trang Khánh Hòa - Sđt: (098) 87654321</p>
        <p>✉️ congloi_milk@gmail.ntu.vn</p>
    </div>
    </div>
</body>

</html>