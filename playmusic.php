<?php
    session_start();
	require_once("admin/system/database.php");
	
    // Neu da dang nhap thi cap nhat lai thong tin user tu database
    if (isset($_SESSION["user"])) {
        $_SESSION["user"] = GetUserByUsername($_SESSION["user"]["username"]);
    }

    // Neu logout thi xoa username, chuyen toi trang login
    if (isset($_GET["logout"])) {
        session_destroy();
        session_unset();
        header("location: index.php");
	}
	require_once("admin/system/usercheck.php");
	$id = $_GET['id'];
	// $id = trim($id,"\r");
	$result = GetMusicById($id);
	// bien dem view
	$count = $result["views"];
	// ham tang view ++
	$result1 = Updataviews($count,$id);
	$result2 = GetAllCategoryOfMusic($id);
	
?>


<!doctype html>
<html lang="en">
<head>
<title>Play Music</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap-table CSS -->
    <link href="vendor/bootstrap-table/dist/bootstrap-table.css" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="vendor/fontawesome/css/all.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/main-style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>
	<script src="js/shorten.js"></script>
    <!-- Bootstrap JS -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- Bootstrap-table JS -->
    <script src="vendor/bootstrap-table/dist/bootstrap-table.js"></script>
    <script src="vendor/bootstrap-table/dist/bootstrap-table-locale-all.js"></script>
	<!--Cookie-->
	<script src="js\cookie.js"></script>
	<script src="js/audioplayer.js" charset="utf-8"></script>


</head>
<body id ="mp3">
	<?php include 'navigation.php';?>
	<div id ="mp3">
		<div class="container-fluid">	
				<div class="row">
					<div class="col-md-9">
						<div class="box_content1">
							<h1><?php echo $result["name"] ?></h1>
							<ul class="ul_box_content">
								<li>
									<span class="label">Ca sĩ:</span>
									<span class="val"><?php echo $result["singer"] ?></span>
								</li>
								<li>
									<span class="label">Thể loại:</span>
									<span class="val">
									<?php
									while ($category = mysqli_fetch_assoc($result2)) {
										echo GetNameCategory($category["id_category"]) . ", ";
									}
									?>
									</span>
								</li>
							</ul>
						</div>	
						<div class="box_content" style="padding-bottom:30px;padding-top:30px;">
							<div class = "row">
								<div class = "col-md-12">
									<img class="rounded mx-auto d-block" id="musicImageShow" src="images/music/<?php echo $result["image"]?>">
								</div>
								<div class = "col-md-12">
									<div class="audio-player justify-content-center" style="padding-top:30px;">
										[
											{
											"title": "<?php echo $result["name"]?>",
											"src": "album/<?php echo $result["link"] ?>",
											"type": "audio/mpeg3"
											}
										]
									</div>
									<!-- <audio controls >
										<source src="album/<?php echo $result["link"] ?>" type="audio/mpeg">
									</audio> -->
								</div>
							</div>
						</div>
						<div class="box_content1">
							<h2>Lời bài hát</h2>
							<span id="music-lyric" name="music-lyric" class="music-lyric">
								<?php echo nl2br($result["lyric"]) ?>
							</span>
						</div>
						<div class="box_content">
							<h2 class="mx-2">Các bài hát cùng chủ đề</h2>
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
					</div>
					<!-- Cot trai -->
					<div class="col-md-3">
						<div class="box_content1">
							<div class="music_listened">
								<div class = "header-box">
									<h3>DANH SÁCH ĐÃ NGHE</h3>
								</div>
								<ul class="ul_music_listened">
									<?php 									
										$musicIds = $_COOKIE["musicIds"];
										$arr = explode(",",$musicIds);
										$count_arr = count($arr);
										// echo $count_arr."<br>";
										$count_list = 0;
										$count_id = $count_arr-1;
										// foreach($arr as $id){
										for ($count_id ; $count_id >= 0; $count_id--) {
											$id = $arr[$count_id];
											$count_list ++;
											if ($count_list == 6){
												$count_list = 0;
												break;
											}
											//  echo $count_list."<br>";
											$result = GetMusicById($id);
									?>		
												<li class="col-marr align-self-center listen_active" id="<?php echo $result["id"] ?>">
													<img src="images/music/<?php echo $result["image"]?>" alt="<?php echo $result["name"]?>">
													<div class="info_song_home">
														<h3 class="name over-text white"><a href="playmusic.php?id=<?php echo $result["id"] ?>&name=<?php echo $result["name"] ?>" title="<?php echo $result["name"] ?>"><?php echo $result["name"]?></a></h3>
														<h4 class="singer over-text black gray-color singer-h4"><a title="<?php echo $result["singer"] ?>" class="singer" href="#"><?php echo $result["singer"] ?></a></h4>
													</div>
												</li>
									<?php	
										}
										
									?>
									
								</ul>
							</div>
						</div>

						<!-- ds bai hat moi -->
						<?php 
							$result = GetMusicTop();
						?>
						<div class="box_content1">
							<div class="music_listened">
								<div class = "header-box">
									<h3>BÀI HÁT MỚI</h3>
								</div>
								<ul class="ul_music_listened">
								<?php
									$count = 1;
									while ($music = mysqli_fetch_assoc($result)) {
								?>
									<li class="col-marr align-self-center listen_active" id="<?php echo $music["id"] ?>">
										<img src="images/music/<?php echo $music["image"]?>" alt="<?php echo $music["name"]?>">
										<div class="info_song_home">
											<h3 class="name over-text white"><a href="playmusic.php?id=<?php echo $music["id"] ?>&name=<?php echo $music["name"] ?>" title="<?php echo $music["name"] ?>"><?php echo $music["name"]?></a></h3>
											<h4 class="singer over-text black gray-color singer-h4"><a title="<?php echo $music["singer"] ?>" class="singer" href="#"><?php echo $music["singer"] ?></a></h4>
										</div>
									</li>
								<?php
									}
								?>
								</ul>
							</div>
						</div>

					</div>
				</div>
			
		</div>
	</div>
	<?php include 'footer.php';?>
	<script type="text/javascript">
		$(".music-lyric").shorten({
			"showChars" : 300,
			"moreText"  : "Xem thêm",
			"lessText"  : "Rút gọn",
		});
	</script>
</body>
</html>