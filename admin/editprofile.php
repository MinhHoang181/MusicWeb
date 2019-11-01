<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
    $user = GetUserByUsername($_GET["username"]);
?>
<div class="container">
  <h2 class="text-info"><a href="index.php?menu=userdata" class="text-dark"><i class="fa fa-arrow-left"></i></a>  Edit Profile: <?php echo $_GET["username"] ?></h2>
  <hr>
  
	<div class="row">
      <!-- avatar -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="../images/<?php echo $user["avatar"] ?>" class="rounded-circle img-fluid" alt="avatar">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <!-- thong bao-->
        
          <?php 
          if (isset($_SESSION["edit_success"])) { 
          ?>
            <div class="col-lg-8 alert alert-success alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <?php 
              echo $_SESSION["edit_success"];
              unset($_SESSION["edit_success"]); 
              ?>
            </div>
          <?php 
          } else if (isset($_SESSION["edit_fail"])) { 
          ?>
            <div class="col-lg-8 alert alert-danger alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <?php 
              echo $_SESSION["edit_fail"];
              unset($_SESSION["edit_fail"]);
              ?>
            </div>
          <?php
          }
          ?>
        
        <!--/.alert -->
        <h3>Thông tin cá nhân</h3>
        <!-- form edit-->
        <form id="editForm" action="system/account.php" method="POST" enctype="multipart/form-data">
          <!-- username -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Tên đăng nhập:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="username" value="<?php echo $user["username"] ?>" readonly>
            </div>
          </div>
          <!-- fullname -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Họ và tên:</label>
            <div class="col-lg-8">
              <input id="fullName" class="form-control" type="text" name="fullname" value="<?php echo $user["fullname"] ?>">
            </div>
          </div>
          <!-- password -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Mật khẩu:</label>
            <div class="col-lg-8">
              <input id="password" class="form-control" type="password" name="password" value="<?php echo $user["password"]?>">
            </div>
          </div>
          <!-- email -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input id="email" class="form-control" type="text" name="email" value="<?php echo $user["email"] ?>">
            </div>
          </div>
          <!-- user_type -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Quyền hạn:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_type" class="form-control" name="user_type">
                  <option value="user" <?php if($user["user_type"]=="user") {echo "selected";} ?>>User</option>
                  <option value="admin" <?php if($user["user_type"]=="admin") {echo "selected";} ?>>Admin</option>
                </select>
              </div>
            </div>
          </div>
          <!-- file avatar -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Ảnh đại diện</label>
            <div class="col-lg-8">
              <input id="avatar" class="form-control" type="file" name="avatar">
            </div>
          </div>
            <button type="button" class="btn btn-secondary btn-lg ml-3" id="refeshBtn">Thiết lập lại</button>
            <button type="submit" class="btn btn-secondary btn-lg ml-3" name="editBtn" id="updateBtn" disabled>Lưu thay đổi</button>
        </form>
        <!--/.form edit -->
      </div>
  </div>
</div>

<script>
$("#editForm :input").on("input",function() {
        $("#updateBtn").prop("disabled", false);
});
</script>