<?php
    session_start();

    // Neu logout thi xoa username, chuyen toi trang login
    if (isset($_GET["logout"])) {
        session_destroy();
        unset($_SESSION["username"]);
        unset($_SESSION["avatar"]);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main-style.css">
    <style>
        [class*="col-"] {
      margin-bottom: 10px;
    }
  </style>
    <title>WEB MUSIC</title>
</head>

<body id="mp3">
    <div class="navbar-top bg-dark navbar-dark">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark mx-5">
            <!-- Brand -->
            <a class="navbar-brand" href="#">Ky Phan</a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
            <!-- Thong tin user -->
            <span id="collapsibleNavbar" class="collapse show mr-sm-3">
                <ul class="navbar-nav">
                    <!-- Avatar -->
                    <li class="nav-item">
                        <img src=
                        <?php if (isset($_SESSION["avatar"])) {
                            echo $_SESSION["avatar"];
                        } else {
                            echo "images/guestAvatar.jpeg";
                        }
                        ?>
                        alt="guest" class="rounded-circle float-right avt-img" style="width: 50px;">
                    </li>
                    <!-- Dang nhap -->
                    <?php if (isset($_SESSION["username"])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION["username"]; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Nhạc cá nhân</a>
                                <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php?logout='1'">Đăng xuất</a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php" target="_black">Đăng nhập</a>
                        </li>
                    <?php } ?>
                </ul>
            </span>
        </nav>
    </div>
    
    <!--content-->
    <div class="container">
        <div class="containerBHX">
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
        <div class="containerBHX">
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
        <!-- BXH 2-->
        <div class="containerBHX">
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
        <div class="box_content">
            <ul class="music_list">
              <li class="col-marr1">1</li>
              <li class="col-marr2">2</li>
              <li class="col-marr1">1</li>
              <li class="col-marr2">2</li>
              <li class="col-marr1">1</li>
              <li class="col-marr2">2</li>
              <li class="col-marr1">1</li>
              <li class="col-marr2">2</li>
              <li class="col-marr1">1</li>
              <li class="col-marr2">2</li>
            </ul>
        </div>
    </div>
    <!--BX4-->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>