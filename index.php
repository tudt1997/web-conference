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
                <b>Giới thiệu</b>
                    <br/><br/>
                <p class="text-justify">Hội thảo Khoa học Công nghệ 4.0 lần thứ nhất về "Một số vấn đề chọn lọc của Công nghệ thông tin và Truyền thông" do Viện Công nghệ thông tin - Học viện Công nghệ Bưu chính Viễn thông, tổ chức tại thành phố Hà Nội từ ngày 20 đến ngày 21 tháng 5 năm 2018. Hội thảo là diễn đàn thường niên để những người làm công tác nghiên cứu, triển khai, giảng dạy và quản lý trong lĩnh vực công nghệ thông tin và truyền thông trao đổi học thuật, chia sẻ kinh nghiệm ứng dụng và tìm kiếm sự hợp tác. Đặc biệt hội thảo khuyến khích các nhà khoa học trẻ, nghiên cứu sinh, học viên cao học tham gia báo cáo trao đổi kết quả nghiên cứu và học tập của mình. Hội thảo khuyến khích trưng bày giới thiệu các sản phẩm khoa học công nghệ và những kết quả nghiên cứu ứng dụng vào thực tiễn.</p>
                <strong>Các chủ đề chính (nhưng không hạn chế) của Hội thảo</strong>
                <br/><br/>
                <div class="row">
                    <div class="col-sm-4">
                        Các hệ thống thông minh<br/>
                        An toàn thông tin<br/>
                        Mã nguồn mở<br/>
                        Điện toán đám mây<br/>
                        Giáo dục điện tử, đào tạo từ xa<br/>
                        Xử lý ngôn ngữ tự nhiên<br/>
                        Các hệ thống nhúng<br/>
                        Thực tại ảo<br/>
                        Các hệ thống tích hợp<br/>
                    </div>
                    <div class="col-sm-8">
                        Công nghệ phần mềm<br/>
                        Công nghệ mạng và mạng không dây<br/>
                        Công nghệ tri thức và tính toán mềm<br/>
                        Xử lý ảnh và kỹ thuật video<br/>
                        Các công nghệ tính toán hiện đại<br/>
                        Các hệ thống hỗ trợ ra quyết định<br/>
                        Tin-sinh học<br/>
                        Cơ sở toán học của tin học<br/>
                        Công nghệ thông tin trong kinh tế - xã hội<br/>
                    </div>
                </div>
                <br/>
                <p><strong>Các đơn vị tài trợ (tính đến thời điểm hiện tại)</strong>
                    <br/>
                <ul>
                    <li>Tập đoàn Bưu chính Viễn thông Việt Nam</li>
                    <li>Viện Công nghệ thông tin</li>
                    <li>Học viện Công nghệ Bưu chính Viễn thông</li>
                    <li>Một số tổ chức và cá nhân khác</li>
                </ul>
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
