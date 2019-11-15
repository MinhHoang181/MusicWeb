<?php
    session_start();
    require_once("admin/system/database.php");
    // Neu da dang nhap thi cap nhat lai thong tin user tu database
    if (isset($_SESSION["user"])) {
        $_SESSION["user"] = GetUserByUsername($_SESSION["user"]["username"]);
    }

    // Neu logout thi xoa username, chuyen toi trang login
    if (isset($_GET["logout"])) {
        session_destroy();
        session_unset();
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap-table CSS -->
    <link href="vendor/bootstrap-table/dist/bootstrap-table.css" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="vendor/fontawesome/css/all.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/main-style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- Bootstrap-table JS -->
    <script src="vendor/bootstrap-table/dist/bootstrap-table.js"></script>
    <script src="vendor/bootstrap-table/dist/bootstrap-table-locale-all.js"></script>

</head>
<body>
    <!-- Navigation -->
	<?php include 'navigation.php';?> 
    <div id = "mp3">
        <div class = "awall container">
            <div class="user-info-box-header ">
                <a class="user-info-box-header-img " href="javascript:void(0);">
                    <img src =
                        <?php 
                            if (isset($_SESSION["user"])) { // Neu dang nhap thi hien thi link avatar cua user
                                echo "images/" . $_SESSION["user"]["avatar"];
                            } 
                            else {
                                echo "images/guestAvatar.jpeg"; // Neu chua dang nhap thi hien thi default
                            }
                        ?>
                        alt="user" id="avatarShow1">
                </a>
                <div class="user-info">
                    <p class="username">
                        <?php
                            if ($_SESSION["user"]["fullname"] == '') {
                                echo $_SESSION["user"]["username"]; 
                            } else {
                                echo $_SESSION["user"]["fullname"]; 
                            }
                        ?> 
                        <span class="
                            <?php 
                                if(($_SESSION["user"]["user_type"])=="admin")
                                    {echo "badge badge-danger";}
                                else {echo "badge badge-success";}
                            ?>
                        ">
                            <?php echo $_SESSION["user"]["user_type"]; ?>
                        </span>
                    </p>
                    <p class="detail-info"><?php echo $_SESSION["user"]["email"]; ?></p>
                    <p class="btn-action">
                        <a href="" target="_blank" class="btn-action-item">Sửa thông tin</a>
                        <a href="javascript:void(0);" class="btn-action-item" onclick="">Thông tin tài khoản</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="box_content">
                <ul class="nav nav-tabs justify-content-md-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nhạc đã nghe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nhạc yêu thích</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tuỳ chọn</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php';?>
  
</body>

</html>