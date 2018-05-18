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
include './views/navbar.php';
?>
<div class="container">
    <h1>Gửi bài báo</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <!--            <div class="alert alert-info alert-dismissable">-->
            <!--                <a class="panel-close close" data-dismiss="alert">×</a>-->
            <!--                <i class="fa fa-coffee"></i>-->
            <!--                This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
            <!--            </div>-->
            <!--            <h3>Thông tin cá nhân</h3>-->
            <form class="form-horizontal" role="form" action="./controller/upload_article.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tên bài báo:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Chọn file PDF để tải lên:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="file" name="pdf" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Gửi bài báo
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include './views/footer.php'; ?>
</body>
</html>