<div class="navbar-top bg-dark">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark mx-5">
            <!-- Brand -->
            <a class="navbar-brand" href="index.php">Trang chủ</a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
            <!-- Thong tin user -->
            <span id="collapsibleNavbar" class="collapse show mr-sm-3">
                <ul class="navbar-nav">
                    <!-- Avatar -->
                    <li class="avatar-frame">
                    
                    
                    
                    <?Php 
                    if (isset($_SESSION["user"])) { 
                    ?>
                        <img id="avatarShow" src="images/<?php echo $_SESSION["user"]["avatar"] ?>" alt="avatar">
                    <?php
                    } 
                    else {
                    ?>
                        <img id="avatarShow" src="images\guestAvatar.jpeg" alt="avatar">
                    <?php 
                        } 
                    ?>

                    </li>

                    <!-- Dang nhap -->
                    <?php if (isset($_SESSION["user"])) { // Neu dang nhap thi hien ten, muc dropdown ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Hien ten -->
                                <?php
                                if ($_SESSION["user"]["fullname"] == '') {
                                    echo $_SESSION["user"]["username"]; 
                                } else {
                                    echo $_SESSION["user"]["fullname"]; 
                                }
                                 ?>
                                <!----------------------------------------->
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Nhạc cá nhân</a>
                                <a class="dropdown-item" href="profile.php">Thông tin cá nhân</a>
                                <div class="dropdown-divider"></div>
                                <!-- Neu user_type = admin thi xuat hien muc ADMIN -->
                                <?php if ($_SESSION["user"]["user_type"] == "admin") { ?>
                                    <a class="dropdown-item" href="admin/index.php"><strong>Chức năng admin</strong></a>
                                <?php } ?>
                                <!----------------------------------------------------------------------->
                                <a class="dropdown-item" href="index.php?logout='1'">Đăng xuất</a>
                            </div>
                        </li>
                    <?php } else { // Neu chua dang nhap thi hien muc dang nhap ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php" target="_black">Đăng nhập</a>
                        </li>
                    <?php } ?>
                </ul>
            </span>
        </nav>
    </div>
