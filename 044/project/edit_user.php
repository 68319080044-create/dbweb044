<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "044");

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['full_name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    $stmt = $mysqli->prepare("UPDATE users SET full_name=?, username=?, phone=?, status=? WHERE id=?");
    $stmt->bind_param("ssssi", $fullname, $username, $phone, $status, $id);
    $stmt->execute();

    header("Location: users_management.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>

<body>
    <h2>Edit User</h2>

    <form method="POST">
        <label>Full Name</label><br>
        <input type="text" name="full_name" value="<?= $user['full_name'] ?>" required><br><br>

        <label>Username</label><br>
        <input type="text" name="username" value="<?= $user['username'] ?>" required><br><br>

        <label>Phone</label><br>
        <input type="text" name="phone" value="<?= $user['phone'] ?>"><br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="admin" <?= $user['status'] == 'admin' ? 'selected' : '' ?>>admin</option>
            <option value="user" <?= $user['status'] == 'user' ? 'selected' : '' ?>>user</option>
        </select><br><br>

        <button type="submit">Save</button>
    </form>
</body>


</html>