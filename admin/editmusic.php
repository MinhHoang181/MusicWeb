<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
    $music = GetMusicById($_GET["id"]);
?>

<style>
.music-frame {
  display: inline-block;
  position: relative;
  overflow: hidden;
  height: 200px;
  width: auto;
}

.music-frame img {
  width: auto;
  height: 100%;
}
</style>

<div class="container">
  	<h2 class="text-info"><a href="index.php?menu=musicdata" class="text-dark"><i class="fa fa-arrow-left"></i></a> Bài hát: <?php echo $music["name"]?></h2>
  	<hr>
	<form id="editMusicForm" action="system/music.php?idMusic=<?php echo $_GET["id"]?>" method="POST" enctype="multipart/form-data">
		<div class="row">
			<!-- music image -->
			<div class="col-md-4">
				<div class="music-image">
					<div class="music-frame">
						<img class="mx-auto" id="musicImageShow" src="../images/music/<?php echo $music["image"]?>" alt="music-image">
					</div>
					<div class="form-group">
						<label class="control-label">Ảnh bìa bài hát:</label>
						<input id="musicImageFile" type="file" class="form-control-file" name="music-image">
					</div>
				</div>
				<!-- music-file -->
				<div class="form-group">
					<audio id="audioControl" controls>
  						<source id="audioMusic" src="../album/<?php echo $music["link"]?>" type="audio/mpeg">
  						Your browser does not support the audio tag.
					</audio>
					<label class="control-label">File bài hát:</label>
					<input id="musicFile" type="file" class="form-control-file" name="music-file">
				</div>
			</div>
			<!--./music-image-->

			<!-- info music -->
			<div class="col-md-7 ml-auto pr-5">
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
				<!-- music-name -->
				<div class="form-group">
					<label class="control-label">Tên bài hát:</label>
					<input type="text" class="form-control" id="music-name" name="music-name" value="<?php echo $music["name"]?>">
				</div>
				<!-- music-singer -->
				<div class="form-group">
					<label class="control-label">Tên nghệ sĩ:</label>
					<input type="text" class="form-control" id="music-singer" name="music-singer" value="<?php echo $music["singer"]?>">
				</div>
				<!-- music-category -->
				<div class="form-group">
					<label class="control-label">Thể loại: </label>
					<div class="input-group">
						<input id="music-categories" type="text" class="form-control col-9">
						<a class="btn btn-outline-secondary col-3" data-toggle="collapse" href="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">Chọn thể loại</a>
					</div>
					<div class="collapse" id="collapseCategory">
						<?php
						$result = GetAllCategory();
						$music_categories = GetAllCategoryOfMusic($music["id"]);
						$array = array();
						while ($row = mysqli_fetch_assoc($music_categories)) {
							array_push($array, $row["id_category"]);
						}
						while ($category = mysqli_fetch_assoc($result)) { 
						?>
						<div class="form-check-inline">
							<label class="form-check-label p-2">
								<input type="checkbox" class="form-check-input" name="<?php echo $category["id"]?>" value="<?php echo $category["id"]?>" <?php if(in_array($category["id"], $array)) {echo "checked";}?>><?php echo $category["name"]?>
							</label>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<!-- music-lyric -->
				<div class="form-group">
					<label class="control-label">Lời bài hát:</label>
					<textarea class="form-control" id="music-lyric" name="music-lyric" style="height: 250px"><?php echo $music["lyric"]?></textarea>
				</div>
				<button class="btn btn-secondary btn-lg" type="button" id="refreshBtn" disabled>Thiết lập lại</button>
				<button class="btn btn-secondary btn-lg ml-3" type="subimt" id="updateBtn" name="updateBtn" disabled>Lưu</button>
			</div>
			<!--/.info music-->
		</div>
		<!--./row-->
	</form>
	<!--/.form-->
</div>

<script>
$("document").ready(function() {
	var imageLocation = $("#musicImageShow").attr("src");
	var name = $("#music-name").val();
	var singer = $("#music-singer").val();
	var lyric = $("#music-lyric").val();

	// Luu lai nhung the loai duoc chon
	var category = [];
	$("input:checked").each(function() {
		category.push($(this).val());
	});

	// Khi thay doi noi dung thi active 2 nut
	$("#editMusicForm :input").on("input",function() {
      $("#updateBtn").prop("disabled", false);
      $("#refreshBtn").prop("disabled", false);
  	});

	// Khi an nut refresh
	$("#refreshBtn").on("click", function() {
		$("#music-name").val(name);
		$("#music-singer").val(singer);
		$("#music-lyric").val(lyric);
		$("#musicImageShow").attr("src", imageLocation);
		$("#music-categories").val("");
		$("input").each(function() {
			if ($.inArray($(this).val(), category) != -1) {
				$(this).prop("checked", true);
			} else {
				$(this).prop("checked", false);
			}
		});

		$("#updateBtn").prop("disabled", true);
      	$("#refreshBtn").prop("disabled", true);

	});

  	// Thay doi avatar khi chon file anh
  	$("#musicImageFile").change(function() {
    	readImageFile(this, imageLocation);
  	});
});

// Doc file va show avatar khi chon file anh
function readImageFile(input, location) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $("#musicImageShow").attr("src", e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  } else {
    $("#musicImageShow").attr("src", location);
  }
}
</script>