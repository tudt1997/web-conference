<!-- <div class="jumbotron text-center" style="margin-bottom:0"> -->
<link rel="stylesheet" type="text/css" href="css/main.css">
<div class="thumbnail">
    <img src="./images/banner.jpg" alt="" width="100%">
    <div class="centered">
        <h3>Hội thảo Khoa Học Công Nghệ 4.0</h3>
    </div>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="articles.php">Bài báo</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <?php
            // $_SESSION['username'] = 'test';
            if (!isset($_SESSION['username'])) {
                ?>
                <li>
                    <a class="nav-link" href="javascript:void(0);" onclick="document.getElementById('login').style.display='block'">
                        <i class="fa fa-sign-in"></i> Đăng nhập
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="javascript:void(0);" onclick="document.getElementById('register').style.display='block'">
                        <i class="fa fa-edit"></i> Đăng ký
                    </a>
                </li>
                <?php
            } else {
                echo '
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <i class="fa fa-user"></i> Xin chào, ' . htmlspecialchars($_SESSION["name"]) . '
                    </a>
                    <div class="dropdown-menu">
                        '; if ($_SESSION['id'] == 1)
                            echo '<a class="dropdown-item" href="./manage.php">Quản lý</a>';
                        echo '<a class="dropdown-item" href="./account.php">Thông tin cá nhân</a>
                        <a class="dropdown-item" href="./send_article.php"">Gửi bài</a>
                    </div>
                </li>
                <li>
                    <a class="nav-link" href="./controller/logout.php">
                        <i class="fa fa-sign-out"></i> Đăng xuất
                    </a>
                </li>
                ';
            }
            ?>
        </ul>
    </div>
</nav>

<div id="login" class="modal">
    <!-- Modal Content -->
    <form id="login_form" class="modal-content animate">
        <div class="container">
            <h1>Đăng Nhập</h1>
            <p>Hãy điền thông tin tài khoản.</p>
            <hr>
            <label for="uname">
                <b>Tên tài khoản</b>
            </label>
            <input type="text" class="form-control" placeholder="Nhập tên tài khoản" name="username" id="username" required>

            <label for="psw">
                <b>Mật khẩu</b>
            </label>
            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" id="password" required>

            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Nhớ tài khoản
            </label>
        </div>
    </form>
</div>

<div id="register" class="modal">
    <form id="register_form" class="modal-content animate">
        <div class="container">
            <h1>Đăng Ký</h1>
            <p>Hãy điền thông tin tạo tài khoản.</p>
            <hr>
            <label for="uname">
                <b>Tên tài khoản</b>
            </label>
            <input type="text" class="form-control" placeholder="Nhập tên tài khoản" name="username" id="username2" required>

            <label for="uname">
                <b>Họ và tên</b>
            </label>
            <input type="text" class="form-control" placeholder="Nhập họ và tên" name="name" id="name" required>

            <label for="psw">
                <b>Mật khẩu</b>
            </label>
            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" id="password2" required>

            <label for="psw-repeat">
                <b>Nhập lại mật khẩu</b>
            </label>
            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="confirm_password" id="confirm_password" required>

            <div class="clearfix">
                <button type="submit" class="btn btn-primary">Đăng Ký</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Get the modal
    const modalLogin = document.getElementById('login');
    const modalRegister = document.getElementById('register');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modalLogin) {
            modalLogin.style.display = "none";
        }
        if (event.target === modalRegister) {
            modalRegister.style.display = "none";
        }
    };

    $('#login').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type     : "POST",
            url      : './controller/login.php',
            data     : $('#login_form').serialize(),
            success  : function(result) {
                if (result !== '') {
                    window.alert(result);
                }
                else {
                    location.reload()
                }
            }
        });
    });


    $('#register').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type     : "POST",
            url      : './controller/register.php',
            data     : $('#register_form').serialize(),
            success  : function(result) {
                if (result !== '') {
                    window.alert(result);
                }
                else {
                    window.alert('Đăng ký thành công!');
                    location.reload();
                }
            }
        });
    });
</script>