<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "044");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['full_name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO users (full_name, username, phone, status, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullname, $username, $phone, $status, $password);

    if ($stmt->execute()) {
        header("Location: users_management.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Add User</title>
</head>

<body>

    <h2>Add New User</h2>

    <form method="POST">
        <label>Full Name</label><br>
        <input type="text" name="full_name" required><br><br>

        <label>Username</label><br>
        <input type="text" name="username" required><br><br>

        <label>Phone</label><br>
        <input type="text" name="phone"><br><br>

        <label>Status</label><br>
        <select name="status" required>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Add User</button>
    </form>

</body>

</html>