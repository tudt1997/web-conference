<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--    <link rel="stylesheet" type="text/css" href="./css/account.css">-->
    <?php
        include './views/header.php';
        include 'session.php';
    ?>
    <style>
        .avatar-user-edit{
            height: 100px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
if (empty($_GET['id'])) {
//    $id = $_SESSION['id'];
//    $get_user = mysqli_query($conn, "SELECT * FROM users WHERE id ='$id'");
//    $current_user = mysqli_fetch_array($get_user);
    $user = $current_user;
}
else {
    $user_id = $_GET['id'];
    if ($_SESSION['id'] != 1 && $_SESSION['id'] != $user_id) {
        header('location: index.php');
    }
    $get_user_show = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
    $rows = mysqli_num_rows($get_user_show);
    if ($rows) {
        $user = mysqli_fetch_array($get_user_show);
//        echo serialize($user);
    } else {
        header('location: index.php');
    }
}
?>
    <?php include './views/navbar.php'; ?>
<!--    <div class="main">-->
<!--        <h2>Thông tin người dùng</h2>-->
<!--        <div class="card">-->
<!--            <div class="row">-->
<!--                <div class="col-md-4">-->
<!--                    <div class="image">-->
<!--                        <img class="profile-avatar" src="images/avatar.png">-->
<!--                        --><?php //echo '
//              <div class="text-muted">' . $user['username'] . '</div>
//              ';
//                        ?>
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4 info">-->
<!--                    --><?php //echo '
//            <h3><b>' . $user['name'] . '</b> <small>
//              ' . (
//                        ($user['id'] == 1) ? '<span class="badge badge-warning">Admin</span>'
//                            : '<span class="badge badge-secondary">User</span>'
//                        )
//                        . '
//              </small></h3>
//            ';
//                    ?><!--<br>-->
<!--                    --><?php //echo '
//            <b>Giới tính:</b> ' . ($user['gender'] === 0 ? 'Nữ' : 'Nam') . '<br><br>
//            <b>Ngày sinh:</b> ' . $user['dob'] . '<br><br>
//            <b>Địa chỉ:</b> ' . $user['address'] . '<br><br>
//            ';
//                    ?>
<!--                </div>-->
<!--                <div class="col-md-4 info">-->
<!--                    --><?php //echo '
//            <b>Email:</b> ' . $user['email'] . '<br><br>
//            <b>Số điện thoại:</b> ' . $user['phone'] . '<br><br>
//            ';
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        --><?php
//        if ($user == $current_user)
//            echo '
//          <a href="user_edit.php" class="btn btn-primary">Chỉnh sửa thông tin cá nhân</a>
//          ';
//        ?>
<!--    </div>-->
<?php //echo '
//    <div class="title">
//      <h2>Thông tin người tham dự</h2>
//      <img class="avatar-user-edit" src="./images/avatar.png"/>
//    </div>
//    <div class="signup-form">
//      <form action="./actions/user_action.php" method="post">
//        <div class="form-group">
//          <div class="row">
//            <div class="col-sm-6"">Tên đầy đủ: <input type="text" value="'.$current_user['name'].'" class="form-control" name="name" required="required"></div>
//            <div class="col-sm-6">Tài khoản: <input type="text" value="'.$current_user['username'].'" class="form-control" name="username" required="required"></div>
//          </div>
//        </div>
//        <div class="form-group">
//          <div class="row">
//            <div class="col-sm-6"">Ngày sinh: <input type="date" value="'.$current_user['dob'].'" class="form-control" name="dob" required="required"></div>
//            <div class="col-sm-2">Giới tính:
//              <select class="form-control" name="gender">
//                <option>Nam</option>
//                <option '.(($current_user['gender'] === 0) ? 'selected="selected"' :'' ).'>Nữ</option>
//                <option>Khác</option>
//              </select>
//            </div>
//            <div class="col-sm-4">Số điện thoại: <input type="tel" value="'.$current_user['phone'].'" class="form-control" name="phone" required="required"></div>
//          </div>
//        </div>
//        <div class="form-group">
//          Email: <input type="email" value="'.$current_user['email'].'" class="form-control" name="email" required="required">
//        </div>
//        <div class="form-group">
//          Địa chỉ: <input type="text" value="'.$current_user['address'].'" class="form-control" name="address" required="required">
//        </div>
//        <div class="form-group">
//          Nhập mật khẩu để hoàn thành:<input type="password" class="form-control" name="password" required="required">
//          <input type="hidden" value="'.$current_user['password'].'" name="current_password">
//          <input type="hidden" value="'.$current_user['id'].'" name="id">
//        </div>
//        <div class="form-group">
//          <div class="row">
//            <div class="offset-sm-3 col-sm-6">
//              <button type="submit" class="btn btn-success">Cập nhật thông tin</button>
//            </div>
//          </div>
//        </div>
//      </form>
//    </div>
//    ';
//?>
<div class="container">
    <h1>Thông tin cá nhân</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="./images/avatar.png" class="avatar img-circle" alt="avatar">
<!--                <h6>Upload a different photo...</h6>-->
<!---->
<!--                <input type="file" class="form-control">-->
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
<!--            <div class="alert alert-info alert-dismissable">-->
<!--                <a class="panel-close close" data-dismiss="alert">×</a>-->
<!--                <i class="fa fa-coffee"></i>-->
<!--                This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
<!--            </div>-->
<!--            <h3>Thông tin cá nhân</h3>-->
            <?php echo '
            <form class="form-horizontal" id="update" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tên tài khoản:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="' . $user['username'] . '" disabled >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Họ và tên:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="' . $user['name'] . '" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Ngày sinh:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" value="' . $user['dob'] . '" name="dob">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Giới tính:</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="gender">
                            <option>Nam</option>
                            <option '.(($user['gender'] === 0) ? 'selected="selected"' :'' ).'>Nữ</option>
                        </select>
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label class="col-lg-3 control-label">Time Zone:</label>-->
<!--                    <div class="col-lg-8">-->
<!--                        <div class="ui-select">-->
<!--                            <select id="user_time_zone" class="form-control">-->
<!--                                <option value="Hawaii">(GMT-10:00) Hawaii</option>-->
<!--                                <option value="Alaska">(GMT-09:00) Alaska</option>-->
<!--                                <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>-->
<!--                                <option value="Arizona">(GMT-07:00) Arizona</option>-->
<!--                                <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>-->
<!--                                <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>-->
<!--                                <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>-->
<!--                                <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Số điện thoại:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="' . $user['phone'] . '" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Địa chỉ:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="' . $user['address'] . '" name="address">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Khách sạn:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="' . $user['hotel'] . '" name="hotel">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Phương tiện di chuyển:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="' . $user['vehicle'] . '" name="vehicle">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Yêu cầu:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="" value="' . $user['requirements'] . '" name="requirements">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Nhập mật khẩu để xác nhận:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" name="password" value="">
                        <input type="hidden" value="'.$user['password'].'" name="current_password">
                        <input type="hidden" value="'.$user['id'].'" name="id">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Thay đổi thông tin
                    </div>
                </div>
            </form> ';
            ?>
        </div>
    </div>
</div>

<?php include './views/footer.php'; ?>

</body>
</html>

<script>
    $('#update').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type     : "POST",
            url      : './controller/update_account.php',
            data     : $('#update').serialize(),
            success  : function(result) {
                window.alert(result);
            }
        });
    });
</script>
