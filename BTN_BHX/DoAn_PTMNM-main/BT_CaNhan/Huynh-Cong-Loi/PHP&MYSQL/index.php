<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang chủ</title>
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
            <ul> <?php include("config.php");
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $query = "SELECT DISTINCT HangSua FROM Sua";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li><a href="index.php?hang=' . $row['HangSua'] . '">' . $row['HangSua'] . '</a></li>';
                        }
                    } else {
                        echo "Không có hãng nào.";
                    }

                    mysqli_close($conn);
                    ?>
            </ul>

            <h4>Danh sách loại sữa</h4>
            <ul>
                <?php
                include("config.php");

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT DISTINCT LoaiSua FROM Sua";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li><a href="index.php?loai=' . $row['LoaiSua'] . '">' . $row['LoaiSua'] . '</a></li>';
                    }
                } else {
                    echo "Không có loại sữa nào.";
                }

                mysqli_close($conn);
                ?>
            </ul>
            <div class="banner">
                <img src="images/banner_2.png" alt="Banner 1">
                <img src="images/banner_3.jpg" alt="Banner 2">
                <img src="images/banner_4.jpg" alt="Banner 3">
            </div>
        </div>
    </div>

        <div class="main-content">
            <div class="product-list">
                <table>
                    <thead>
                        <tr>
                            <th>Hình</th>
                            <th>Tên sữa</th>
                            <th>Trọng lượng (gr)</th>
                            <th>Đơn giá (VNĐ)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $condition = "";

                        if (isset($_GET['hang'])) {
                            $hang = $_GET['hang'];
                            $condition = "WHERE HangSua = '$hang'";
                        }

                        if (isset($_GET['loai'])) {
                            $loai = $_GET['loai'];
                            if ($condition !== "") {
                                $condition .= " AND LoaiSua = '$loai'";
                            } else {
                                $condition = "WHERE LoaiSua = '$loai'";
                            }
                        }

                        $query = "SELECT * FROM Sua $condition";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td><div class="product-image"><img src="images/' . $row['Hinh'] . '" alt="' . $row['TenSua'] . '"></div></td>';
                                echo '<td><div><a href="chi_tiet_sua.php?ma_sua=' . $row['MaSua'] . '">' . $row['TenSua'] . '</a></div></td>';
                                echo '<td><div>' . $row['TrongLuong'] . '</div></td>';
                                echo '<td><div>' . $row['DonGia'] . '0.000</div></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">Không có sản phẩm nào.</td></tr>';
                        }


                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
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
    <div class="footer">
        <p>©️ 2023 HCL M I L K. Tất cả các quyền được bảo lưu.</p>
        <p>Địa chỉ: 234 Nguyễn Đình Chiểu Nha Trang Khánh Hòa - Sđt: (098) 87654321</p>
        <p>✉️ congloi_milk@gmail.ntu.vn</p>
    </div>
    </div>
</body>

</html>