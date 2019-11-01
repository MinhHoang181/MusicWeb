<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <title>Đăng ký</title>
  </head>
  <body>
      <div class="container">
          <div class="row mt-5">
              <div class="col-6 mx-auto">
                    <form class="bg-light p-3" id="registerForm" action="admin/system/server.php" method="POST">
                        <!-- ten dang nhap -->
                        <div class="form-group">
                            <label><b>Tên đăng nhập</b></label>
                            <input type="text" class="form-control" id="username" name="username">
                            <!-- thong bao loi phan username -->
                            <div class="text-danger pt-2" id="usernameError"></div>
                        </div>
                        <!-- mat khau -->
                        <div class="form-group">
                            <label><b>Mật khẩu</b></label>
                            <input type="password" class="form-control" id="password1" name="password1">
                            <!-- thong bao loi phan password1 -->
                            <div class="text-danger pt-2" id="password1Error"></div>
                        </div>
                        <!-- nhap lai mat khau -->
                        <div class="form-group">
                            <label><b>Nhập lại mật khẩu</b></label>
                            <input type="password" class="form-control" id="password2" name="password2">
                            <!-- thong bao loi phan password2 -->
                            <div class="text-danger pt-2" id="password2Error"></div>
                        </div>
                        <!-- email -->
                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="text" class="form-control" id="email" name="email">
                            <!-- thong bao loi email -->
                            <div class="text-danger pt-2" id="emailError"></div>
                        </div>
                        <!-- dong y dieu khoan -->
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="acceptLaw" checked>
                            <p>Tôi đã đọc và đồng ý các điều kiện
                                <a href="#"> Thoả thuận sử dụng</a>
                            </p>
                        </div>
                            <!-- thong bao loi phan accepttLaw -->
                            <div class="text-danger mb-3" id="acceptLawError"></div>
                        <!-- nut dang ky -->
                        <button type="submit" class="btn btn-primary btn-block" name="registerBtn">Đăng ký mới</button>
                    </form>
                    <!-- chuyen sang trang dang nhap -->
                    <div class="d-flex justify-content-center">
                        <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay!</a></p>
                    </div>

                    <!-- Thong bao khong dang ky duoc -->
                    <?php // Neu khong register duoc, thong bao loi
                    if (isset($_SESSION["register_error"])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
                        <?php // in lenh loi
                        echo $_SESSION["register_error"];
                        unset($_SESSION["register_error"]);
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
    <script type="text/JavaScript" src="js/register.js"></script>
  </body>
</html>