<?php
$mysqli = new mysqli("localhost", "root", "", "044");

$id = $_GET['id'];
$mysqli->query("DELETE FROM users WHERE id=$id");

header("Location: users_management.php");
exit();
