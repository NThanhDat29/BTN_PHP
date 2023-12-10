<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chi tiết sản phẩm</title>
    <style>
        .search-form {
            margin-bottom: 20px;
        }

        .search-results {
            margin-top: 20px;
        }

        .details-box {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            /* Thêm dòng này để sử dụng flexbox */
        }

        .details-box p {
            margin: 10px 0 0 10px;
            flex: 1;
            /* Thêm dòng này để mỗi phần tử p chiếm 1/2 độ rộng của details-box */
        }
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
            <h4>Danh sách hãng</h4>
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
        <div class="search-form">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="loai_sua">Loại Sữa:</label>
                <select name="loai_sua" id="loai_sua">
                    <!-- Hiển thị danh sách các loại sữa từ CSDL -->
                    <?php
                    include 'config.php';

                    // Truy vấn lấy danh sách các loại sữa từ CSDL
                    $sql_loai_sua = "SELECT DISTINCT LoaiSua FROM sua";
                    $result_loai_sua = mysqli_query($conn, $sql_loai_sua);

                    // Hiển thị danh sách các loại sữa dưới dạng danh sách chọn
                    while ($row_loai_sua = mysqli_fetch_assoc($result_loai_sua)) {
                        echo '<option value="' . $row_loai_sua['LoaiSua'] . '">' . $row_loai_sua['LoaiSua'] . '</option>';
                    }

                    // Giải phóng bộ nhớ
                    mysqli_free_result($result_loai_sua);
                    // Đóng kết nối
                    mysqli_close($conn);
                    ?>
                </select>

                <label for="hang_sua">Hãng Sữa:</label>
                <select name="hang_sua" id="hang_sua">
                    <!-- Hiển thị danh sách các hãng sữa từ CSDL -->
                    <?php
                    include 'config.php';

                    // Truy vấn lấy danh sách các hãng sữa từ CSDL
                    $sql_hang_sua = "SELECT DISTINCT HangSua FROM sua";
                    $result_hang_sua = mysqli_query($conn, $sql_hang_sua);

                    // Hiển thị danh sách các hãng sữa dưới dạng danh sách chọn
                    while ($row_hang_sua = mysqli_fetch_assoc($result_hang_sua)) {
                        echo '<option value="' . $row_hang_sua['HangSua'] . '">' . $row_hang_sua['HangSua'] . '</option>';
                    }

                    // Giải phóng bộ nhớ
                    mysqli_free_result($result_hang_sua);
                    // Đóng kết nối
                    mysqli_close($conn);
                    ?>
                </select>

                <label for="ten_sua">Tên Sữa:</label>
                <input type="text" name="ten_sua" id="ten_sua">

                <input type="submit" name="submit" value="Tìm kiếm">
            </form>
        </div>

        <div class="search-results">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                include 'config.php';

                // Lấy dữ liệu tìm kiếm từ form
                $loai_sua = $_POST['loai_sua'];
                $hang_sua = $_POST['hang_sua'];
                $ten_sua = $_POST['ten_sua'];

                // Thực hiện truy vấn tìm kiếm sản phẩm theo yêu cầu
                $sql_search = "SELECT * FROM sua WHERE LoaiSua = '$loai_sua' AND HangSua = '$hang_sua' AND TenSua LIKE '%$ten_sua%'";
                $result_search = mysqli_query($conn, $sql_search);

                if (mysqli_num_rows($result_search) > 0) {
                    while ($row = mysqli_fetch_assoc($result_search)) {
                        echo '<h2>' . $row['TenSua'] . ' - ' . $row['HangSua'] . ' - ' . $row['LoaiSua'] . '</h2>';
                        echo '<div class="details-box">';
                        echo '<img src="images/' . $row['Hinh'] . '" alt="' . $row['TenSua'] . ' width="100" height="100"">';
                        echo '<div>'; // Thêm thẻ div để tạo cột phải
                        echo '<p>Trọng lượng: ' . $row['TrongLuong'] . 'g</p>';
                        echo '<p>Đơn giá: ' . $row['DonGia'] . '0.000 VNĐ</p>';
                        echo '<p>Thành phần: ' . $row['ThanhPhan'] . '</p>';
                        echo '<p>Lợi ích: ' . $row['LoiIch'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Không tìm thấy sản phẩm.</p>';
                }

                // Giải phóng bộ nhớ
                mysqli_free_result($result_search);
                // Đóng kết nối
                mysqli_close($conn);
            }
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