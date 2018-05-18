<?php
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES['pdf']['error'] > 0)
    {
        echo 'File Upload Bị Lỗi';
    }
    else{
        // Upload file
        move_uploaded_file($_FILES['pdf']['tmp_name'], '../uploads/'.$_FILES['pdf']['name']);
        $user_id = $_SESSION['id'];
        $name = $_POST['name'];
        $file_name = $_FILES['pdf']['name'];
        if ($user_id == 1)
            $checked = 1;
        else
            $checked = 0;
        $sql = "INSERT INTO articles (name, file_name, checked, user_id) VALUES ($name, $file_name, $checked, $user_id)";
        if (mysqli_query($conn, $sql)) {
            echo "
                  <script>
                  window.alert('Gửi bài thành công');
                  </script>
                ";
            header("location: ../index.php");
        } else {
            echo "
              <script>
              window.alert('Gửi bài không thành công');
//              window.history.back();
              </script>
            ";
        }
    }
}