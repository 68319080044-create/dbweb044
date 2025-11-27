<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "<h2>กรุณาล็อกอินก่อนครับ</h2>";
    echo "<a href='login.php'>ไปหน้าล็อกอิน</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        :root {
            --mint-50: #f2fffb;
            --mint-200: #c8fff0;
            --mint-300: #9cf5df;
            --mint-500: #2ecaa9;
            --mint-600: #24ae8f;
            --mint-700: #1b8b6c;
            --dark-text: #06321f;
        }

        body {
            background: linear-gradient(135deg, var(--mint-50), var(--mint-200) 40%, var(--mint-300));
            font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            min-height: 100vh;
            margin: 0;
            color: var(--dark-text);
        }

        /* -------------------- Navbar -------------------- */
        .navbar {
            width: 100%;
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 15px rgba(5, 40, 20, 0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .navbar .brand {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--mint-700);
        }

        .navbar .user-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar .user-area span {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark-text);
        }

        .logout-small {
            background: linear-gradient(90deg, #54e6c6, #2ecaa9);
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.25s;
            box-shadow: 0 4px 12px rgba(46, 202, 169, 0.3);
        }

        .logout-small:hover {
            background: linear-gradient(90deg, #2ecaa9, #24ae8f);
        }

        .brand-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-link {
            font-weight: 600;
            color: var(--mint-700);
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 8px;
            transition: 0.25s ease;
            background: rgba(46, 202, 169, 0.15);
        }

        .nav-link:hover {
            background: var(--mint-500);
            color: white;
        }


        /* -------------------- Profile Card -------------------- */
        .wrapper {
            display: flex;
            justify-content: center;
            padding: 30px 20px;
        }

        .profile-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.88));
            box-shadow: 0 8px 25px rgba(5, 40, 20, 0.15);
            border-radius: 12px;
            max-width: 500px;
            width: 100%;
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: var(--mint-700);
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        p {
            font-size: 1rem;
            margin: 8px 0;
        }

        hr {
            border: none;
            height: 1px;
            background: var(--mint-300);
            margin: 25px 0;
        }

        a.logout-btn {
            display: inline-block;
            background: linear-gradient(90deg, #54e6c6, #2ecaa9);
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 10px;
            transition: 0.3s;
            box-shadow: 0 8px 15px rgba(46, 202, 169, 0.25);
        }

        a.logout-btn:hover {
            background: linear-gradient(90deg, #2ecaa9, #24ae8f);
            box-shadow: 0 0 12px rgba(46, 202, 169, 0.4);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand-area">
            <div class="brand">NomSod Mint</div>
            <a href="users_management.php" class="nav-link">Users Management</a>
        </div>

        <div class="user-area">
            <span>👤 <?= htmlspecialchars($_SESSION['fullname']); ?></span>
            <a href="logout.php" class="logout-small">Logout</a>
        </div>
    </nav>


    <div class="wrapper">
        <div class="profile-card">
            <h1>What's up, <?= htmlspecialchars($_SESSION['fullname']); ?></h1>
            <p><strong>Username:</strong> <?= htmlspecialchars($_SESSION['username']); ?></p>
            <hr>
            <a href="logout.php" class="logout-btn">Logout?</a>
        </div>
    </div>

</body>

</html>