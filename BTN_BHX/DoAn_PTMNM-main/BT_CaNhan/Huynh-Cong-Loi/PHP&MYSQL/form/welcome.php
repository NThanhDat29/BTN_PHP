<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .welcome-message {
            text-align: center;
            font-size: 24px;
            margin-top: 100px;
        }

        .logout-button {
            text-align: center;
            margin-top: 20px;
        }

        .logout-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout-button a:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="welcome-message">
        <?php
        // Lấy tên người dùng từ tham số URL
        $username = $_GET['username'];
        echo "Welcome $username!";
        ?>
    </div>

    <div class="logout-button">
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>