<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
    $user = GetUserByUsername($_GET["username"]);
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
  <h2 class="text-info"><a href="index.php?menu=userdata" class="text-dark"><i class="fa fa-arrow-left"></i></a>  Edit Profile: <?php echo $_GET["username"] ?></h2>
  <hr>
  
	<div class="row">
      <!-- avatar -->
      <div class="col-md-3">
        <div class="avatar-frame">
          <img id="avatarShow" src="../images/<?php echo $user["avatar"] ?>" alt="avatar">
        </div>
        <?Php 
        if ($user["avatar"] != "guestAvatar.jpeg") { 
        ?>
          <button id="deleteAvatarBtn" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <?php
        } 
        ?>
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
              <input id="fullname" class="form-control" type="text" name="fullname" value="<?php echo $user["fullname"] ?>">
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
            <input type="hidden" id="avatar" name="avatar" value="<?php echo $user["avatar"] ?>">
            <div class="col-lg-8">
              <input id="avatarFile" class="form-control" type="file" name="avatarFile">
            </div>
          </div>
            <button type="button" class="btn btn-secondary btn-lg ml-3" id="refreshBtn" disabled>Thiết lập lại</button>
            <button type="submit" class="btn btn-secondary btn-lg ml-3" name="editBtn" id="updateBtn" disabled>Lưu thay đổi</button>
        </form>
        <!--/.form edit -->
      </div>
  </div>
</div>

<script>
$("document").ready(function() {
  var fullname = $("#fullname").val();
  var password = $("#password").val();
  var email = $("#email").val();
  var user_type = $("#user_type").val();
  var avatar = $("#avatar").val();
  var avatarLocation = $("#avatarShow").attr("src");
  var saveDistance = 0;

  saveDistance = -1 * MarginAvatar(saveDistance);

  // Khi thay doi profile thi active 2 nut
  $("#editForm :input").on("input",function() {
      $("#updateBtn").prop("disabled", false);
      $("#refreshBtn").prop("disabled", false);
  });

  // khi an nut refresh thi disable 2 nut
  $("#refreshBtn").click(function() {  
    $("#avatarShow").on("load", function() {
      saveDistance = -1 * MarginAvatar(saveDistance);
    }).attr("src", avatarLocation);

    $("#fullname").val(fullname);
    $("#password").val(password);
    $("#email").val(email);
    $("#user_type").val(user_type);
    $("#avatar").val(avatar);
    $("#avatarFile").val(null);

    $("#updateBtn").prop("disabled", true);
    $("#refreshBtn").prop("disabled", true);
  });

  // Khi an nut xoa avatar
  $("#deleteAvatarBtn").click(function() {
    $("#avatarShow").on("load", function() {
      saveDistance = -1 * MarginAvatar(saveDistance);
    }).attr("src", "../images/guestAvatar.jpeg");
    $("#avatar").val("guestAvatar.jpeg"); 

    $("#updateBtn").prop("disabled", false);
    $("#refreshBtn").prop("disabled", false);
  });

  // Thay doi avatar khi chon file anh
  $("#avatarFile").change(function() {
    readURL(this, saveDistance, avatarLocation);
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
function readURL(input, saveDistance, location) {
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
    }).attr("src", "../images/" + location);
  }
}
</script>