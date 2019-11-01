<?php 
    require_once("system/database.php");
    $user = GetUserByUsername($_GET["username"]);
?>
<div class="container">
    <h1 class="text-primary">Edit Profile <?php echo $_GET["username"] ?></h1>
      <hr>
	<div class="row">
      <!-- avatar -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="../images/<?php echo $user["avatar"] ?>" class="avatar img-circle" alt="avatar">
          <br><br>
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <!-- thong bao-->
        <div class="col-lg-8 alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          Thong bao o day
        </div>
        <!--/.alert -->
        <h3>Thông tin cá nhân</h3>
        <!-- form edit-->
        <form action="#" method="POST">
          <!-- fullname -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Họ và tên:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php if(isset($user["fullname"])) {echo $user["fullname"];} ?>">
            </div>
          </div>
          <!-- password -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Mật khẩu:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" value="<?php echo $user["password"]?>">
            </div>
          </div>
          <!-- email -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $user["email"] ?>">
            </div>
          </div>
          <!-- user_type -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Quyền hạn:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                  <option value="user" <?php if($user["user_type"]=="user") {echo "selected";} ?>>User</option>
                  <option value="admin" <?php if($user["user_type"]=="admin") {echo "selected";} ?>>Admin</option>
                </select>
              </div>
            </div>
          </div>
          <!--/.user_type-->
            <button type="button" class="btn btn-primary btn-lg ml-3">Thiết lập lại</button>
            <button type="submit" class="btn btn-primary btn-lg ml-3">Lưu thay đổi</button>
        </form>
        <!--/.form edit -->
      </div>
  </div>
</div>