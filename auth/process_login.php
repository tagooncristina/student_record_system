<?php
session_start();
include "../config/db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->execute([$username, $password]);

$user = $stmt->fetch();

if($user){
    $_SESSION['user'] = $username;
    header("Location: ../dashboard.php");
} else {
    echo "Invalid login!";
}
?>