<?php
include 'connect.php';
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$message = '';

if ($username && $password) {
  $sql = "SELECT * FROM users WHERE username = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['fullname'] = $row['full_name'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['status'] = $row['status'];

      if ($row['status'] === 'admin') {
        header("Location: index.php");
      } else {
        header("Location: profile.php"); 
      }
      exit();
    } else {
      $message = "❌ รหัสผ่านไม่ถูกต้อง!";
    }
  } else {
    $message = "❌ ไม่พบบัญชีผู้ใช้!";
  }
} else {
  $message = "⚠️ กรุณากรอกข้อมูลให้ครบ!";
}
?>
<!doctype html>
<html lang="th">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Result - Mint Grid</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f2fffb, #c8fff0 40%, #9cf5df);
      color: #06321f;
      font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, Arial;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .result-container {
      background: rgba(255, 255, 255, 0.9);
      padding: 35px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(5, 40, 20, 0.12);
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      color: #1b8b6c;
    }

    p {
      font-size: 1.2rem;
    }

    a.btn {
      margin-top: 20px;
      background: linear-gradient(90deg, #54e6c6, #2ecaa9);
      border: none;
      color: #fff;
    }

    a.btn:hover {
      background: linear-gradient(90deg, #2ecaa9, #24ae8f);
    }
  </style>
</head>

<body>
  <div class="result-container">
    <h2>ผลการเข้าสู่ระบบ</h2>
    <p><?= htmlspecialchars($message) ?></p>
    <a href="login.php" class="btn btn-primary">ไปที่หน้า Login</a>
  </div>
</body>

</html>