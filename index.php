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

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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
    <!--Cookie-->
    <script src="js\cookie.js"></script>

    <style>
        [class*="col-"] {
            margin-bottom: 10px;
        }
    </style>
    
    <title>WEB MUSIC</title>
</head>

<body id="mp3">
    <?php include 'navigation.php';?> 
    <!--content-->
    <div class="container">
        <div class="box_content">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 mx-auto img-fluid" src="images\1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 mx-auto img-fluid" src="images\2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 mx-auto img-fluid" src="images\3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--#TOP BXH 1-->
        <div class="box_content">
            <h2 class="mx-2">#TOP BXH</h2>
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="https://photo-resize-zmp3.zadn.vn/w480_r1x1_jpeg/cover/6/9/e/a/69ea4808abddca0ed7c7060f4beffa3a.jpg" class="card-img-top" alt="...">
                            <span class="circle-play"></span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Cơn mưa ngang qua</h5>
                            <p style="text-size:14px;">Chi Dân, Sơn Tùng MTP</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="https://photo-resize-zmp3.zadn.vn/w480_r1x1_jpeg/cover/5/9/e/2/59e2e9d2684204297f935b0614dbf681.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="https://photo-resize-zmp3.zadn.vn/w480_r1x1_jpeg/cover/3/3/4/3/33431183ea49c8791e6c625be4009b39.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="https://photo-resize-zmp3.zadn.vn/w480_r1x1_jpeg/cover/1/b/1/a/1b1ab85294fe4c0a1a4cd95bee510cc1.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BXH 2-->
        <div class="box_content">
            <h2 class="mx-2">#TOP BXH</h2>
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="https://photo-resize-zmp3.zadn.vn/w480_r1x1_jpeg/cover/6/9/e/a/69ea4808abddca0ed7c7060f4beffa3a.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="https://photo-resize-zmp3.zadn.vn/w480_r1x1_jpeg/cover/5/9/e/2/59e2e9d2684204297f935b0614dbf681.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="https://photo-resize-zmp3.zadn.vn/w480_r1x1_jpeg/cover/3/3/4/3/33431183ea49c8791e6c625be4009b39.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-img">
                            <img src="https://photo-resize-zmp3.zadn.vn/w480_r1x1_jpeg/cover/1/b/1/a/1b1ab85294fe4c0a1a4cd95bee510cc1.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BXH 3-->
        <?php 
        $result = GetMusicTop();
        ?>
        <div class="box_content">
            <h2 class="mx-2">BÀI HÁT MỚI</h2>
            <ul class="music_list">
                <!-- -->
                <?php
                $count = 1;
                while ($music = mysqli_fetch_assoc($result)) {
                    if ($count % 2 != 0) {
                ?>
                <li class="col-marr1 listen_active" id="<?php echo $music["id"] ?>" >
                    <a onclick="#" href="playmusic.php?id=<?php echo $music["id"] ?>&name=<?php echo $music["name"] ?>"><img src="images/music/<?php echo $music["image"]?>" alt="<?php echo $music["name"] ?>"></a>
                    <div class="info_song_home" >
                        <h3 class="name over-text white"><a href="playmusic.php?id=<?php echo $music["id"] ?>&name=<?php echo $music["name"] ?>" title="<?php echo $music["name"] ?>" id="<?php echo $music["name"] ?>"><?php echo $music["name"] ?></a></h3>
                        <h4 class="singer over-text black gray-color singer-h4"><a title="<?php echo $music["singer"] ?>" class="singer" href="#"><?php echo $music["singer"] ?></a></h4>
                    </div>
                </li>
                <?php
                    }
                    else { 
                ?>
                <li class="col-marr2 listen_active" id="<?php echo $music["id"] ?>">
                    <a onclick="#" href="playmusic.php?id=<?php echo $music["id"] ?>&name=<?php echo $music["name"] ?>"><img src="images/music/<?php echo $music["image"]?>" alt="<?php echo $music["name"] ?>"></a>
                    <div class="info_song_home">
                        <h3 class="name over-text white"><a href="playmusic.php?id=<?php echo $music["id"] ?>&name=<?php echo $music["name"] ?>" title="<?php echo $music["name"] ?>"><?php echo $music["name"] ?></a></h3>
                        <h4 class="singer over-text black gray-color singer-h4"><a title="<?php echo $music["singer"] ?>" class="singer" href="#"><?php echo $music["singer"] ?></a></h4>
                    </div>
                </li>
                <?php
                        }
                        $count++;
                    }
                ?>
              <!--/.li -->
              
            </ul>
        </div>
        <div class="box_content">
            <h2 class="mx-2">Ca Sĩ</h2>
        </div>
    </div>
    <!--BX4-->
  

    
    <?php include 'footer.php';?>

<!-- Optional JavaScript -->
<script>
    var slideIndex = 0;
    //showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 1500); // Change image every 2 seconds
    }
</script>
</body>

</html>