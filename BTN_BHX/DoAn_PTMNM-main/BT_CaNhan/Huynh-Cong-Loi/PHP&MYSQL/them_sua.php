<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thêm mới sản phẩm</title>
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

        /* Thêm CSS cho layout */
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
        <h2>Thêm Sữa Mới</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'config.php';

            // Lấy dữ liệu từ form
            $ma_sua = $_POST['ma_sua'];
            $ten_sua = $_POST['ten_sua'];
            $hang_sua = $_POST['hang_sua'];
            $loai_sua = $_POST['loai_sua'];
            $trong_luong = $_POST['trong_luong'];
            $don_gia = $_POST['don_gia'];
            $thanh_phan = $_POST['thanh_phan'];
            $loi_ich = $_POST['loi_ich'];
            $hinh = $_POST['hinh'];


            // Thực hiện truy vấn chèn dữ liệu vào cơ sở dữ liệu
            $sql = "INSERT INTO sua (MaSua, TenSua, HangSua, LoaiSua, TrongLuong, DonGia, ThanhPhan, LoiIch, Hinh) 
            VALUES ('$ma_sua','$ten_sua', '$hang_sua', '$loai_sua', '$trong_luong', '$don_gia', '$thanh_phan', '$loi_ich', '$hinh')";

            if (mysqli_query($conn, $sql)) {
                echo "Thêm sữa thành công!";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }

            // Đóng kết nối
            mysqli_close($conn);
        }
        ?>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <?php
            include 'config.php';

            // Lấy mã sữa mới nhất
            $sql_latest_ma_sua = "SELECT MAX(MaSua) AS latest_ma_sua FROM sua";
            $result_latest_ma_sua = mysqli_query($conn, $sql_latest_ma_sua);
            $row_latest_ma_sua = mysqli_fetch_assoc($result_latest_ma_sua);
            $latest_ma_sua = $row_latest_ma_sua['latest_ma_sua'];
            $next_ma_sua = $latest_ma_sua + 1;

            // Giải phóng bộ nhớ
            mysqli_free_result($result_latest_ma_sua);
            ?>
            <label for="ma_sua">Mã Sữa:</label>
            <input type="text" name="ma_sua" id="ma_sua" value="<?php echo $next_ma_sua; ?>" readonly><br><br>


            <label for="ten_sua">Tên Sữa:</label>
            <input type="text" name="ten_sua" id="ten_sua" required><br><br>

            <label for="hang_sua">Hãng Sữa:</label>
            <select name="hang_sua" id="hang_sua" required>
                <?php
                include 'config.php';
                // Truy vấn để lấy danh sách các giá trị hãng sữa từ cơ sở dữ liệu
                $sql_hang_sua = "SELECT DISTINCT HangSua FROM sua";
                $result_hang_sua = mysqli_query($conn, $sql_hang_sua);

                // Hiển thị các giá trị hãng sữa trong dropdown
                while ($row_hang_sua = mysqli_fetch_assoc($result_hang_sua)) {
                    echo '<option value="' . $row_hang_sua['HangSua'] . '">' . $row_hang_sua['HangSua'] . '</option>';
                }

                // Giải phóng bộ nhớ
                mysqli_free_result($result_hang_sua);
                ?>
            </select><br><br>

            <label for="loai_sua">Loại Sữa:</label>
            <select name="loai_sua" id="loai_sua" required>
                <?php
                // Truy vấn để lấy danh sách các giá trị loại sữa từ cơ sở dữ liệu
                $sql_loai_sua = "SELECT DISTINCT LoaiSua FROM sua";
                $result_loai_sua = mysqli_query($conn, $sql_loai_sua);

                // Hiển thị các giá trị loại sữa trong dropdown
                while ($row_loai_sua = mysqli_fetch_assoc($result_loai_sua)) {
                    echo '<option value="' . $row_loai_sua['LoaiSua'] . '">' . $row_loai_sua['LoaiSua'] . '</option>';
                }

                // Giải phóng bộ nhớ
                mysqli_free_result($result_loai_sua);

                // Đóng kết nối
                mysqli_close($conn);
                ?>
            </select><br><br>

            <label for="trong_luong">Trọng Lượng:</label>
            <input type="text" name="trong_luong" id="trong_luong" required><br><br>

            <label for="don_gia">Đơn Giá:</label>
            <input type="text" name="don_gia" id="don_gia" required><br><br>

            <label for="thanh_phan">Thành Phần:</label>
            <input type="text" name="thanh_phan" id="thanh_phan" required><br><br>

            <label for="loi_ich">Lợi Ích:</label>
            <input type="text" name="loi_ich" id="loi_ich" required><br><br>

            <label for="hinh">Hình ảnh:</label>
            <input type="file" id="hinh" name="hinh" required><br><br>

            <input type="submit" value="Thêm mới">
        </form>
        <?php

        // Kết nối CSDL
        include 'config.php';
        // Truy vấn lấy thông tin của bảng "sua"
        $sql_sua = "SELECT * FROM sua";
        $result_sua = mysqli_query($conn, $sql_sua);
        ?>

        <!-- Hiển thị bảng thông tin -->
        <table>
            <thead>
                <tr>
                    <th>Mã Sữa</th>
                    <th>Tên Sữa</th>
                    <th>Hãng Sữa</th>
                    <th>Loại Sữa</th>
                    <th>Trọng Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thành Phần</th>
                    <th>Lợi Ích</th>
                    <th>Hình</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Duyệt qua từng dòng kết quả và hiển thị thông tin
                while ($row_sua = mysqli_fetch_assoc($result_sua)) {
                    echo '<tr>';
                    echo '<td>' . $row_sua['MaSua'] . '</td>';
                    echo '<td>' . $row_sua['TenSua'] . '</td>';
                    echo '<td>' . $row_sua['HangSua'] . '</td>';
                    echo '<td>' . $row_sua['LoaiSua'] . '</td>';
                    echo '<td>' . $row_sua['TrongLuong'] . '</td>';
                    echo '<td>' . $row_sua['DonGia'] . '</td>';
                    echo '<td>' . $row_sua['ThanhPhan'] . '</td>';
                    echo '<td>' . $row_sua['LoiIch'] . '</td>';
                    echo '<td><img src="images/' . $row_sua['Hinh'] . '" alt="Hình ảnh" width="100" height="100"></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php
        // Giải phóng bộ nhớ
        mysqli_free_result($result_sua);
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