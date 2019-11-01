<?php 
    session_start();

?>
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <title>Đăng nhập</title>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-6 mx-auto">
                    <!-- Form dang nhap -->
                    <form id="loginForm" class="bg-light p-3" action="admin/system/account.php" method="POST">
                        <!-- ten dang nhap -->
                        <div class="form-group">
                            <label><b>Tên đăng nhập</b></label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tài khoản"> 
                            <!-- thong bao loi phan username -->
                            <div class="text-danger pt-2" id="usernameError"></div>
                        </div>
                        <!-- mat khau -->
                        <div class="form-group">
                            <label for="passwordInput"><b>Mật khẩu</b></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                            <!-- thong bao loi phan password -->
                            <div class="text-danger pt-2" id="passwordError"></div>
                        </div>
                        <!-- luu mat khau -->
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="savePassword">
                            <label class="form-check-label" for="savePassword">Lưu mật khẩu</label>
                            <!-- quen mat khau -->
                            <label class="float-right"><a href="#">Quên mật khẩu</a></label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="loginBtn">Đăng nhập</button>
                    </form>
                    <!-- Dang ky -->
                    <div class="d-flex justify-content-center">
                        <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay!</a></p>
                    </div>

                    <!-- Thong bao khong dang nhap duoc -->
                    <?php // Neu khong login duoc, thong bao loi
                    if (isset($_SESSION["login_error"])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
                        <?php // in lenh loi
                        echo $_SESSION["login_error"];
                        unset($_SESSION["login_error"]);
                         ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php } // ket thuc lenh if ?>

                </div> 
            </div> 
         </div>
        
        <!-- jQuery -->
        <script src="vendor/jquery/jquery.js"></script>
        <!-- Bootstrap JS -->
        <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- Optional JavaScript -->
        <script type="text/JavaScript" src="js/login.js"></script>
    </body>
</html>