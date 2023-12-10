<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chi tiết sản phẩm</title>
    <style>
        h2 {
            font-weight: bold;
            color: blue;
            margin-bottom: 10px;
        }

        .product-details img {
            float: left;
            margin-right: 20px;
            width: 200px;
            height: 200px;
        }

        .product-details h3 {
            font-weight: bold;
        }

        .product-details .details-box {
            padding: 10px;
            clear: both;
            position: absolute;
            margin-left: 200px;
        }

        .product-details .details-box p {
            margin: 5px 0;
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
            <h4>Danh sách sữa bán chạy</h4>
            <ul>
                <?php
                include("config.php");

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM Sua WHERE HangSua IN ('Vinamilk', 'Mead Johnson') ORDER BY MaSua ASC LIMIT 10";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li><a href="sua_banchay.php?ma_sua=' . $row['MaSua'] . '">' . $row['TenSua'] . '</a></li>';
                    }
                } else {
                    echo "Không có sữa bán chạy.";
                }

                mysqli_close($conn);
                ?>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="product-details">
        <?php
            include("config.php");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if (isset($_GET['ma_sua'])) {
                $ma_sua = $_GET['ma_sua'];

                $query = "SELECT * FROM Sua WHERE MaSua = '$ma_sua'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    echo '<h2>' . $row['TenSua'] . ' - ' . $row['HangSua'] . ' - ' . $row['LoaiSua'] . '</h2>';
                    echo '<div class="details-box">';
                    echo '<p>Trọng lượng: ' . $row['TrongLuong'] . 'g</p>';
                    echo '<p>Đơn giá: ' . $row['DonGia'] . '0.000 VNĐ</p>';
                    echo '<p>Thành phần: ' . $row['ThanhPhan'] . '</p>';
                    echo '<p>Lợi ích: ' . $row['LoiIch'] . '</p>';
                    echo '</div>';
                    echo '<img src="images/' . $row['Hinh'] . '" alt="' . $row['TenSua'] . '">';
                } else {
                    echo 'Không tìm thấy sản phẩm.';
                }
            } else {
                // Lấy mã sữa đầu tiên trong danh sách sữa bán chạy
                $query = "SELECT MaSua FROM Sua WHERE HangSua IN ('Vinamilk', 'Mead Johnson') ORDER BY MaSua ASC LIMIT 10";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $ma_sua = $row['MaSua'];
                    // Redirect tới sản phẩm sữa đầu tiên
                    header("Location: sua_banchay.php?ma_sua=" . $ma_sua);
                    exit();
                } else {
                    echo 'Không có sữa bán chạy.';
                }
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
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