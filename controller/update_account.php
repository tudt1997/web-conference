<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $sql = "DELETE FROM users WHERE id = {$_GET['id']}"; //Add value
    if (mysqli_query($conn, $sql)) {
        echo '1';
    } else {
        echo '0';
    }
} else {
    if (password_verify($_POST['password'], $_POST['current_password'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = ($_POST['gender'] == 'Nam' ? 1 : 0);
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $hotel = $_POST['hotel'];
        $vehicle = $_POST['vehicle'];
        $requirements = $_POST['requirements'];
        $sql = "UPDATE users SET 
         name = '$name', 
         dob = '$dob',
         gender = '$gender',
         phone = '$phone',
         address = '$address',
         hotel = '$hotel',
         vehicle = '$vehicle',
         requirements = '$requirements'
         WHERE id = {$_POST['id']}";
        if (mysqli_query($conn, $sql)) {
            echo "Cập nhật thành công";
        } else {
            echo "Cập nhật không thành công";
        }
    } else {
        echo "Sai mật khẩu";
    }

}
mysqli_close($conn);