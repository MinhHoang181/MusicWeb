<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
?>

<style>
.avatar-frame {
  display: inline-block;
  position: relative;
  width: 200px;
  height: 200px;
  overflow: hidden;
  border-radius: 50%;
}

.avatar-frame img {
  width: auto;
  height: 100%;
}
</style>

<div class="container">
  <h2 class="text-info"><a href="index.php?menu=userdata" class="text-dark"><i class="fa fa-arrow-left"></i></a>  Tạo tài khoản</h2>
  <hr>
  
	<div class="row">
      <!-- avatar -->
      <div class="col-md-3">
        <div class="avatar-frame">
          <img id="avatarShow" src="../images/guestAvatar.jpeg" alt="avatar">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <!-- thong bao-->
        
          <?php 
          if (isset($_SESSION["create_success"])) { 
          ?>
            <div class="col-lg-8 alert alert-success alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <?php 
              echo $_SESSION["create_success"];
              unset($_SESSION["create_success"]); 
              ?>
            </div>
          <?php 
          } else if (isset($_SESSION["edit_fail"])) { 
          ?>
            <div class="col-lg-8 alert alert-danger alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <?php 
              echo $_SESSION["create_fail"];
              unset($_SESSION["create_fail"]);
              ?>
            </div>
          <?php
          }
          ?>
        
        <!--/.alert -->
        <h3>Thông tin cá nhân</h3>
        <!-- form edit-->
        <form id="createForm" action="system/account.php" method="POST" enctype="multipart/form-data">
          <!-- username -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Tên đăng nhập:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="username" required>
            </div>
          </div>
          <!-- fullname -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Họ và tên:</label>
            <div class="col-lg-8">
              <input id="fullName" class="form-control" type="text" name="fullname">
            </div>
          </div>
          <!-- password -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Mật khẩu:</label>
            <div class="col-lg-8">
              <input id="password" class="form-control" type="password" name="password" required>
            </div>
          </div>
          <!-- email -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input id="email" class="form-control" type="text" name="email">
            </div>
          </div>
          <!-- user_type -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Quyền hạn:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_type" class="form-control" name="user_type">
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
            </div>
          </div>
          <!-- file avatar -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Ảnh đại diện</label>
            <div class="col-lg-8">
              <input id="avatarFile" class="form-control" type="file" name="avatar">
            </div>
          </div>
          <!-- button submit -->
          <button type="submit" class="btn btn-secondary btn-lg ml-3" name="createBtn" id="createBtn">Tạo tài khoản</button>
        </form>
        <!--/.form edit -->
      </div>
  </div>
</div>

<script>
$("document").ready(function() {
  var avatarLocation = $("#avatarShow").attr("src");
  var saveDistance = 0;

  saveDistance = -1 * MarginAvatar(saveDistance);

  // Thay doi avatar khi chon file anh
  $("#avatarFile").change(function() {
    readURL(this, saveDistance);
  });
});

// canh giua avatar vao khung hinh
function MarginAvatar(saveDistance) {
  $("#avatarShow").css("margin-left", saveDistance);
  var avatarFrame = $(".avatar-frame").width();
  var avatar = $("#avatarShow").width();
  var distance = avatarFrame/2 - avatar/2;
  $("#avatarShow").css("margin-left", distance);
  return distance;
}

// Doc file va show avatar khi chon file anh
function readURL(input, saveDistance) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $("#avatarShow").on("load", function() {
        saveDistance = -1 * MarginAvatar(saveDistance);
      }).attr("src", e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  } else {
    $("#avatarShow").on("load", function() {
      saveDistance = -1 * MarginAvatar(saveDistance);
    }).attr("src", "../images/guestAvatar.jpeg");
  }
}
</script>