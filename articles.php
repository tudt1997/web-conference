<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hội thảo Khoa Học Công Nghệ 4.0</title>
    <?php
    session_start();
    require('./views/header.php');
    ?>
</head>

<body>
<?php
require('./views/navbar.php');
?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-9">

        </div>

        <?php
        require('./views/sponsor.php');
        ?>
    </div>
</div>

<?php
require('./views/footer.php');
?>
</body>

</html>
