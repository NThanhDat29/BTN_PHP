<!DOCTYPE html>
<html>
<head>
    <title>Form nhập số tự nhiên</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="">
            <label>Nhập n:</label>
            <input type="text" name="n" required>
            <input type="submit" name="submit" value="Thực hiện">
        </form>

        <?php
        if(isset($_POST['submit'])) {
            // Kiểm tra n có phải là số nguyên dương
            $n = $_POST['n'];
            if(!is_numeric($n) || $n <= 0 || floor($n) != $n) {
                echo "Vui lòng nhập một số nguyên dương.";
            } else {
                // Tạo mảng ngẫu nhiên có n phần tử
                $array = array();
                for($i = 0; $i < $n; $i++) {
                    $array[] = rand(0,101);
                }

                // Hiển thị mảng
                echo "<div class='result'>";
                echo "-Mảng phát sinh ngẫu nhiên có " . $n . " phần tử:<br>";
                echo implode(', ', $array) . "<br>"; // thay dấu , cho | hay bất kỳ dấu gì để ngăn cách theo câu hỏi

                // Đếm số phần tử chẵn
                $evenCount = 0;
                foreach($array as $value) {
                    if($value % 2 == 0) {
                        $evenCount++;
                    }
                }
                echo "-Số phần tử chẵn trong mảng: " . $evenCount . "<br>";

                // Đếm số phần tử nhỏ hơn 100
                $lessThan100Count = 0;
                foreach($array as $value) {
                    if($value < 100) {
                        $lessThan100Count++;
                    }
                }
                echo "-Số phần tử nhỏ hơn 100 trong mảng: " . $lessThan100Count . "<br>";

                // Tính tổng các số âm
                $negativeSum = 0;
                foreach($array as $value) {
                    if($value < 0) {
                        $negativeSum += $value;
                    }
                }
                echo "-Tổng các số âm trong mảng: " . $negativeSum . "<br>";

                // In ra vị trí các phần tử bằng 0
                $zeroPositions = array_keys($array, 0);
                if(!empty($zeroPositions)) {
                    echo "-Vị trí các phần tử bằng 0 trong mảng: ";
                    echo implode(', ', $zeroPositions) . "<br>";
                } else {
                    echo "Không có phần tử nào bằng 0 trong mảng.<br>";
                }

                // Sắp xếp mảng theo thứ tự tăng dần
                sort($array);
                echo "-Mảng sau khi sắp xếp tăng dần:<br>";
                echo implode(', ', $array);
                echo '<br>';

                // Liệt kê và tính tổng các số chính phương bé hơn 100
                $perfectSquares = array();
                $sumOfPerfectSquares = 0;
                foreach($array as $value) {
                    if($value >= -100 && $value <= 100 && sqrt($value) == floor(sqrt($value))) {
                        $perfectSquares[] = $value;
                        $sumOfPerfectSquares += $value;
                    }
                }
                echo "-Các số chính phương bé hơn 100 trong mảng:<br>";
                if(!empty($perfectSquares)) {
                    echo implode(', ', $perfectSquares) . "<br>";
                    echo "-Tổng các số chính phương: " . $sumOfPerfectSquares;
                } else {
                    echo "Không tồn tại số chính phương thỏa điều kiện!!";
                }
                echo "</div>";
                
                
            }
        }
        ?>
    </div>
</body>
</html>