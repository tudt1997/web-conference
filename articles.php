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
    require './controller/config.php';
    ?>
</head>

<body>
<?php
require('./views/navbar.php');
?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-9">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Danh sách bài báo</h2>
                        </div>
                        <!--                            <div class="col-sm-4">-->
                        <!--                                <a href="#" data-toggle="modal" data-target="#AddModal" class="btn btn-success"><i-->
                        <!--                                            class="fa fa-plus"></i> <span>Thêm shipper</span></a>-->
                        <!--                                <a href="actions/export_db_to_xlsx.php" class="btn btn-primary"><i-->
                        <!--                                            class="fa fa-table"></i> <span>Tải xuống Excel</span></a>-->
                        <!--                            </div>-->
                        <!--                            <div class="col-sm-4">-->
                        <!--                                <div class="search-box">-->
                        <!--                                    <div class="input-group">-->
                        <!--                                        <input type="text" class="form-control" placeholder="Search&hellip;">-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên bài báo</th>
                        <th>File pdf</th>
                        <th>Người gửi</th>
                    </tr>
                    </thead>
                    <tbody class="table-article">
                    <?php
                    $get_articles = mysqli_query($conn, "SELECT * FROM articles WHERE checked = 1");
                    $rows = mysqli_num_rows($get_articles);
                    if ($rows) {
                        $index = 1;
                        while ($article = mysqli_fetch_assoc($get_articles)) {
                            $get_users = mysqli_query($conn, "SELECT * FROM users WHERE id = {$article['user_id']}");
                            $user = mysqli_fetch_assoc($get_users);
                            echo '
                      <tr id="row-article-id-' . $article['id'] . '">
                        <td>' . $index . '</td>
                        <td>' . $article['name'] . '</td>                        
                        <td><a href="./uploads/' . $article['file_name'] . '">' . $article['file_name'] . '</a></td>
                        <td>' . $user['name'] . '</td>
                      </tr>
                      ';
                            $index++;
                        }
                    }
                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>
<!--                <div style="text-align: center;">-->
<!--                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#ExcelModal"><i-->
<!--                                class="fa fa-upload"></i> <span>Import from Excel</span></a>-->
<!--                </div>-->
                <!-- <div class="clearfix">
                  <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                      <li class="page-item disabled"><a href="#">Previous</a></li>
                      <li class="page-item"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item active"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link">4</a></li>
                      <li class="page-item"><a href="#" class="page-link">5</a></li>
                      <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div> -->
            </div>
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
