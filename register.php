<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Đăng ký</title>
  </head>
  <body>
      <div class="container">
          <div class="row mt-5">
              <div class="col-6 mx-auto">
                    <form class="bg-light p-3" id="registerForm" action="admin/server.php" method="POST">
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

    <!-- Optional JavaScript -->
    <script src="js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>