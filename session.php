<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include './controller/config.php';
//$_SESSION['id'] = 1;
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("location: index.php");
} else {
    $id = $_SESSION['id'];
    $get_user = mysqli_query($conn, "SELECT * FROM users WHERE id ='$id'");
    $current_user = mysqli_fetch_array($get_user);
    $_SESSION['name'] = $current_user['name'];
}