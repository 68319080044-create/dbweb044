<?php
session_start();

if (!isset($_SESSION['fullname'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <style>
        body {
            font-family: Inter, sans-serif;
            background: linear-gradient(135deg, #f2fffb, #c8fff0 40%, #9cf5df);
            margin: 0;
        }

        .navbar {
            width: 100%;
            padding: 15px 30px;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1b8b6c;
        }

        .nav-link {
            margin-left: 20px;
            color: #1b8b6c;
            text-decoration: none;
            padding: 8px 14px;
            background: rgba(46,202,169,0.15);
            border-radius: 8px;
            transition: 0.25s;
        }

        .nav-link:hover {
            background: #2ecaa9;
            color: white;
        }

        .logout-btn {
            background: #2ecaa9;
            padding: 8px 16px;
            text-decoration: none;
            color: white;
            border-radius: 8px;
        }

        .container {
            padding: 40px;
            text-align: center;
        }

        h1 {
            font-size: 2rem;
            color: #1b8b6c;
        }

        .card {
            margin: 40px auto;
            max-width: 600px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0,0,0,0.15);
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div>
        <span class="brand">Mint Grid Dashboard</span>
        <a href="dashboard.php" class="nav-link">Home</a>
        <a href="users_management.php" class="nav-link">Users</a>
    </div>

    <a href="logout.php" class="logout-btn">Logout</a>
</nav>

<div class="container">
    <div class="card">
        <h1>ยินดีต้อนรับ, <?= htmlspecialchars($_SESSION['fullname']) ?></h1>
        <p>แดชบอร์ดนี้จะใช้แสดงข้อมูลสถิติต่างๆ ในอนาคต เช่น จำนวนสมาชิก, กราฟข้อมูล ฯลฯ</p>
    </div>
</div>

</body>
</html>
