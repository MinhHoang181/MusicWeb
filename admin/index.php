<?php 
    require_once("system/admincheck.php");
    if (isset($_GET["logout"])) {
        session_unset();
        session_destroy();
        header("Location: ../login.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap-table CSS -->
    <link href="../vendor/bootstrap-table/dist/bootstrap-table.css" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="../vendor/fontawesome/css/all.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- Bootstrap-table JS -->
    <script src="../vendor/bootstrap-table/dist/bootstrap-table.js"></script>
    <script src="../vendor/bootstrap-table/dist/bootstrap-table-locale-all.js"></script>

    <title>Dashboard</title>
</head>
<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar" class="border-right">
            <!-- header slider bar -->
            <div class="sidebar-header border-bottom bg-dark" id="sidebar-header">
                <a href="index.php" class="text-decoration-none text-white">Administrator</a>
            </div>
            <!-- Cac muc quan ly -->
            <ul class="list-group list-group-flush">
                <!-- Quan ly du lieu -->
                <li class="active">
                    <a href="#dataSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action">Quản lý dữ liệu</a>
                    <!-- muc con trong Quan ly du lieu -->
                    <ul class="collapse list-unstyled" id="dataSubMenu">
                        <li><a href="index.php?menu=topicdata" class="list-group-item list-group-item-action">Thể loại</a></li>
                        <li><a href="index.php?menu=musicdata" class="list-group-item list-group-item-action">Nhạc</a></li>
                        <li><a href="#" class="list-group-item list-group-item-action">Nghệ sĩ</a></li>
                    </ul>
                </li>
                <!-- Quan ly giao dien -->
                <li class="active">
                    <a href="#uiSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action">Quản lý giao diện</a>
                    <!-- muc con trong Quan ly giao dien -->
                    <ul class="collapse list-unstyled" id="uiSubMenu">
                        <li><a href="index.php?menu=test" class="list-group-item list-group-item-action">Trang chủ</a></li>
                        <li><a href="#" class="list-group-item list-group-item-action">...</a></li>
                        <li><a href="#" class="list-group-item list-group-item-action">...</a></li>
                    </ul>
                </li>
                <!-- Quan ly nguoi dung -->
                <li class="active">
                    <a href="#userSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action">Quản lý tài khoản</a>
                    <!-- muc con trong Quan ly giao dien -->
                    <ul class="collapse list-unstyled" id="userSubMenu">
                        <li><a href="index.php?menu=userdata" class="list-group-item list-group-item-action">Danh sách tài khoản</a></li>
                        <li><a href="#" class="list-group-item list-group-item-action">Quản trị viên</a></li>
                        <li><a href="index.php?logout=1" class="list-group-item list-group-item-action">Thoát</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Nav bar -->
            <nav class="navbar navbar-expand-lg navbar-light border-bottom bg-dark" id="navbar">
                <!-- -->
                <div class="conainer-fluid">
                    <!-- button slidebar -->
                    <button id="sidebarCollapse" class="btn btn-secondary"><i class="fas fa-bars"></i> Quản lý</button>
                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary text-white" href="../index.php"><i class="fas fa-home"></i> Tới trang chủ</a>
                    </li>
                </ul>
            </nav>
            <!-- show data -->
            <div id="data">
                <?php  
                if (isset($_GET["menu"])) {
                    switch ($_GET["menu"]) {
                        case "userdata": 
                            require_once("userdata.php");
                            break;
                        case "editprofile":
                            require_once("editprofile.php");
                            break;
                        case "createprofile":
                            require_once("createprofile.php");
                            break;
                        case "musicdata":
                            require_once("musicdata.php");
                            break;
                        case "addmusic":
                            require_once("addmusic.php");
                            break;
                        case "editmusic":
                            require_once("editmusic.php");
                            break;
                        case "topicdata":
                            require_once("topicdata.php");
                            break;
                    }
                }
                ?>
                <br>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->

<script>
$("#sidebarCollapse").on("click", function() {
    $("#sidebar").toggleClass("active");
});
</script>
</body>
</html>