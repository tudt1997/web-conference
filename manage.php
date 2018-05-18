<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý tài khoản</title>
    <?php
    require 'session.php';
    require('./views/header.php');
    ?>
</head>
<body>

<?php
require('./views/navbar.php');
?>
<br>
<div class="list_users">
    <h2 style="text-align: center;">Bảng quản lý</h2>
    <div class="container">
        <br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab"
                   aria-controls="users" aria-selected="true">Danh sách người dùng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="articles-tab" data-toggle="tab" href="#articles" role="tab"
                   aria-controls="articles" aria-selected="false">Danh sách bài báo</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-5">
                                <!--                                <h2>Danh sách người dùng</h2>-->
                            </div>
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
                            <th>Tài khoản</th>
                            <th>Họ và Tên</th>
                            <th>Số bài báo</th>
                            <th>Vai trò</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $get_users = mysqli_query($conn, "SELECT * FROM users");
                        $rows = mysqli_num_rows($get_users);
                        if ($rows) {
                            $index = 1;
                            while ($user = mysqli_fetch_assoc($get_users)) {
                                $get_num_articles = mysqli_query($conn, "SELECT count(*) FROM articles WHERE checked = 1 AND user_id = {$user['id']}");
                                $num = mysqli_fetch_array($get_num_articles)[0];
                                echo '
                      <tr id="row-user-id-' . $user['id'] . '">
                        <td>' . $index . '</td>
                        <td>' . $user['username'] . '</td>                  
                        <td>' . $user['name'] . '</a></td>      
                        <td>' . $num . '</td>
                        <td>
                          ' .
                                    (($user['id'] == 1) ? 'Admin' : 'User')
                                    . '
                        </td>
                        <td>
                          <a href="account.php?id=' . $user['id'] . '" id="up-' . $user['id'] . '" class="up" title="Chỉnh sửa" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:24px"></i></a>
                          ';
                                if ($user['id'] != 1) echo '<a href="javascript:void(0);" class="delete" title="Xóa" data-toggle="tooltip" onclick="deleteUser(' . $user['id'] . ');"><i class="fa fa-trash" style="font-size:24px"></i></a>';
                                echo '
                        </td>
                      </tr>
                      ';
                                $index++;
                            }
                        }
                        ?>
                        </tbody>

                    </table>

                    <div style="text-align: center;">
                        <a href="./controller/export_db.php" class="btn btn-primary"><i
                                    class="fa fa-table"></i> <span>Tải xuống Excel</span></a>
                    </div>
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
            <div class="tab-pane fade" id="articles" role="tabpanel" aria-labelledby="articles-tab">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-4">
                                <h3>Bài báo đã duyệt</h3>
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
                            <th></th>
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
                        <td>
                          <a href="javascript:void(0);" class="delete" title="Xóa" data-toggle="tooltip" onclick="deleteArticle(' . $article['id'] . ');"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      ';
                                $index++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <h3>Bài báo chưa được duyệt</h3>
                </div>
                <table id="table" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên bài báo</th>
                        <th>File pdf</th>
                        <th>Người gửi</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-article">
                    <?php
                    $get_articles = mysqli_query($conn, "SELECT * FROM articles WHERE checked = 0");
                    $rows = mysqli_num_rows($get_articles);
                    if ($rows) {
                        $index = 1;
                        while ($article = mysqli_fetch_assoc($get_articles)) {
                            $get_users = mysqli_query($conn, "SELECT * FROM users WHERE id = {$article['user_id']}");
                            $user = mysqli_fetch_assoc($get_users);
                            echo '
                      <tr id="row-article2-id-' . $article['id'] . '">
                        <td>' . $index . '</td>
                        <td>' . $article['name'] . '</td>                        
                        <td><a href="./uploads/' . $article['file_name'] . '">' . $article['file_name'] . '</a></td>
                        <td>' . $user['name'] . '</td>
                        <td>
                          <a href="javascript:void(0);" class="delete" title="Chấp nhận" data-toggle="tooltip" onclick="acceptArticle(' . $article['id'] . ');"><i class="fa fa-check" style="font-size:24px"></i></a>
                          <a href="javascript:void(0);" class="delete" title="Từ chối" data-toggle="tooltip" onclick="deleteArticle2(' . $article['id'] . ');"><i class="fa fa-times" style="font-size:24px"></i></a>
                        </td>
                      </tr>
                      ';
                            $index++;
                        }
                    }
                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Manual -->

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Thêm shipper</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="signup-form">
                    <form class="form-add-manual">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6"
                                ">Tên đầy đủ: <input type="text" class="form-control" name="name"
                                                     required="required">
                            </div>
                            <div class="col-sm-6">Tài khoản: <input type="text" class="form-control"
                                                                    name="username"
                                                                    required="required"></div>
                        </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6"
                        ">Ngày sinh: <input type="date" class="form-control" name="dob" required="required">
                    </div>
                    <div class="col-sm-6">Số điện thoại: <input type="tel" class="form-control" name="phone"
                                                                required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-8"
                    ">Email: <input type="email" class="form-control" name="email" required="required">
                </div>
                <div class="col-sm-4">Giới tính:
                    <select class="form-control" name="gender">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Khác</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            Địa chỉ: <input type="text" class="form-control" name="address" required="required">
        </div>
        <div class="form-group">
            Mật khẩu mặc định:<input type="password" class="form-control" name="password"
                                     required="required">
        </div>
        <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-success">Thêm</button>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>

<!-- Modal Excel -->
<div class="modal fade" id="ExcelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Thêm shipper</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="signup-form" style="text-align: center;">
                    <form enctype="multipart/form-data" action="actions/shipper_excel_import.php" method="POST"
                          class="form-add-excel">
                        <p>Chọn file và tải lên</p>
                        <input type="file" name="uploaded_file"></input><br><br>
                        <input type="submit" value="Upload" class="btn btn-success"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('./views/footer.php');
?>

</body>
</html>

<script type="text/javascript">
    function deleteUser(id) {
        $.ajax({
            url: './controller/update_account.php?id=' + id,
            type: 'DELETE',
            success: function (result1) {
                if (result1 === '1') {
                    window.alert("Xóa tài khoản thành công");
                    $('#row-user-id-' + id).hide();
                }
                else {
                    window.alert(result1);
                }
            }
        });
    }

    function deleteArticle(id) {
        $.ajax({
            url: './controller/update_article.php?id=' + id,
            type: 'DELETE',
            success: function (result1) {
                if (result1 === '1') {
                    window.alert("Xóa bài báo thành công");
                    $('#row-article-id-' + id).hide();
                }
                else {
                    window.alert(result1);
                }
            }
        });
    }

    function acceptArticle(id) {
        $.ajax({
            url: './controller/update_article.php?id=' + id,
            type: 'ACCEPT',
            success: function (result1) {
                if (result1 === '1') {
                    window.alert("Chấp nhận bài báo thành công");
                }
                else {
                    window.alert(result1);
                }
            }
        });
    }

    function deleteArticle2(id) {
        $.ajax({
            url: './controller/update_article.php?id=' + id,
            type: 'DELETE',
            success: function (result1) {
                if (result1 === '1') {
                    window.alert("Từ chối bài báo thành công");
                    $('#row-article2-id-' + id).hide();
                }
                else {
                    window.alert(result1);
                }
            }
        });
    }
</script>