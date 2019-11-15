<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
    $singer = GetSingerByID($_GET["id"]);
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
  <h2 class="text-info"><a href="index.php?menu=singerdata" class="text-dark"><i class="fa fa-arrow-left"></i></a>  Ca sĩ: <?php echo $singer["name"]?></h2>
  <hr>
  
	<div class="row">
      <!-- avatar -->
      <div class="col-md-3">
        <div class="avatar-frame">
          <img id="avatarShow" src="../images/singer/<?php echo $singer["image"] ?>" alt="avatar">
        </div>
        <?Php 
        if ($singer["image"] != "guestAvatar.jpeg") { 
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
        <form id="editForm" action="system/music.php?idSinger=<?php echo $singer["id"]?>" method="POST" enctype="multipart/form-data">
          <!-- name -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Tên ca sĩ:</label>
            <div class="col-lg-8">
              <input id="name" class="form-control" type="text" name="name" value="<?php echo $singer["name"]?>" required>
            </div>
          </div>
          <!-- info -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Thông tin ca sĩ:</label>
            <div class="col-lg-8">
              <textarea id="info" class="form-control" name="info" style="height: 250px" value="<?php echo $singer["info"]?>"></textarea>
            </div>
				  </div>
          <!-- nation -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Quốc gia:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="nation" class="form-control" name="nation">
                  <option value="Việt Nam" <?php if($singer["nation"]=="Việt Nam") {echo "selected";} ?>>Việt Nam</option>
                  <option value="Âu Mỹ" <?php if($singer["nation"]=="Âu Mỹ") {echo "selected";} ?>>Âu Mỹ</option>
                  <option value="Hàn Quốc" <?php if($singer["nation"]=="Hàn Quốc") {echo "selected";} ?>>Hàn Quốc</option>
                  <option value="Nhật Bản" <?php if($singer["nation"]=="Nhật Bản") {echo "selected";} ?>>Nhật Bản</option>
                  <option value="Hoa Ngữ" <?php if($singer["nation"]=="Hoa Ngữ") {echo "selected";} ?>>Hoa Ngữ</option>
                  <option value="Hoà Tấu" <?php if($singer["nation"]=="Hoà Tấu") {echo "selected";} ?>>Hoà Tấu</option>
                </select>
              </div>
            </div>
          </div>
          <!-- file avatar -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Ảnh đại diện</label>
            <div class="col-lg-8">
              <input id="avatarFile" class="form-control" type="file" name="image">
            </div>
          </div>
            <button type="button" class="btn btn-secondary btn-lg ml-3" id="refreshBtn" disabled>Thiết lập lại</button>
            <button type="submit" class="btn btn-secondary btn-lg ml-3" name="editSingerBtn" id="updateBtn" disabled>Lưu thay đổi</button>
        </form>
        <!--/.form edit -->
      </div>
  </div>
</div>

<script>
$("document").ready(function() {
  var name = $("#name").val();
  var info = $("#info").val();
  var nation = $("#nation").val();
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

    $("#name").val(name);
    $("#info").val(info);
    $("#nation").val(nation);
    $("#avatarFile").val(null);

    $("#updateBtn").prop("disabled", true);
    $("#refreshBtn").prop("disabled", true);
  });

  // Khi an nut xoa avatar
  $("#deleteAvatarBtn").click(function() {
    $("#avatarShow").on("load", function() {
      saveDistance = -1 * MarginAvatar(saveDistance);
    }).attr("src", "../images/singer/guestAvatar.jpeg");

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
    }).attr("src", "../images/singer" + location);
  }
}
</script>