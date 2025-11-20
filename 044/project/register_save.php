<?php
include 'connect.php';

$username = $_POST['username'] ?? '';
$phone = $_POST['phone'] ?? '';
$fullname = $_POST['full_name'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($username) || empty($phone) || empty($fullname) || empty($password) || empty($confirm_password)) {
        $message = "⚠️ กรุณากรอกข้อมูลให้ครบ";
    } elseif ($password !== $confirm_password) {
        $message = "❌ รหัสผ่านไม่ตรงกัน";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, phone, full_name, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $username, $phone, $fullname, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                $message = "✅ สมัครสมาชิกสำเร็จ!";
                $success = true;
            } else {
                $message = "❌ เกิดข้อผิดพลาด: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt);
        } else {
            $message = "❌ ไม่สามารถเตรียมคำสั่ง SQL ได้: " . mysqli_error($con);
        }
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Success!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            color: var(--dark-text);
            font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .result-container {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.88));
            box-shadow: 0 8px 25px rgba(5, 40, 20, 0.12);
            border-radius: 14px;
            max-width: 450px;
            width: 100%;
            text-align: center;
            padding: 40px;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: var(--mint-700);
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1rem;
        }

        a.btn {
            margin-top: 25px;
            background: linear-gradient(90deg, #54e6c6, #2ecaa9);
            border: none;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 25px;
            color: #fff;
            box-shadow: 0 8px 15px rgba(46, 202, 169, 0.25);
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        a.btn:hover {
            background: linear-gradient(90deg, #2ecaa9, #24ae8f);
            box-shadow: 0 0 15px rgba(46, 202, 169, 0.35);
        }

        .icon {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .success {
            color: var(--mint-700);
        }

        .error {
            color: #c62828;
        }
    </style>
</head>

<body>

    <div class="result-container">
        <?php if ($success): ?>
            <div class="icon success">✅</div>
            <h2>สมัครสมาชิกสำเร็จ!</h2>
            <p>ยินดีต้อนรับคุณ <strong><?= htmlspecialchars($fullname) ?></strong> 🎉</p>
            <a href="login.php" class="btn">ไปหน้าเข้าสู่ระบบ</a>
        <?php else: ?>
            <div class="icon error">⚠️</div>
            <h2>ไม่สามารถสมัครสมาชิกได้</h2>
            <p><?= htmlspecialchars($message) ?></p>
            <a href="register_form.php" class="btn">ลองอีกครั้ง</a>
        <?php endif; ?>
    </div>

</body>

</html>