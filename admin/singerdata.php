<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
?>

<style>
.avatar-frame {
  display: inline-block;
  position: relative;
  width: 100px;
  height: 100px;
  overflow: hidden;
  border-radius: 50%;
}

.avatar-frame img {
  width: auto;
  height: 100%;
}
</style>

<div class="container">
    <div class="row">
        <!-- Table -->
        <div class="table-responsive">
            <!-- Toolbar -->
            <div id="toolbar">
                <div class="form-inline" role="form">
                    <!-- Add singer -->
                    <div class="form-group">
                            <a href="index.php?menu=addsinger"><button class="btn btn-secondary"><i class="fa fa-user-plus"></i> Thêm ca sĩ</button></a>
                    </div>
                </div>
            </div>
            <!-- data table -->
            <table 
                data-classes="table table-bordered table-hover"
                data-toggle="table"
                data-locale="vi-VN"

                data-search="true"
                data-show-columns = "true"

                data-button-icon = "true"
                data-show-button-text="true"

                data-pagination = "true"
                data-show-extended-pagination="true"
                data-pagination-loop="false"
                data-page-list = "[10, 25, 50, 100, All]"

                data-toolbar="#toolbar"
            >
                <!-- header -->
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" data-field="id" data-width="100">ID</th>
                        <th class="text-center" data-field="username" data-width="200">Ảnh</th>
                        <th class="text-center" data-field="email" data-width="250">Tên</th>
                        <th class="text-center" data-field="password" data-width="200">Quốc gia</th>
                        <th class="text-center" data-field="action" data-width="100">Tác vụ</th>
                    </tr>
                </thead>   
                <tbody>
                <!-- In tat ca singer -->
                <?php
                $result = GetAllSinger();
                while ($singer = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $singer["id"]?></td>
                        <td class="text-center">
                            <div class="avatar-frame">
                                <img id="avatarShow" src="../images/singer/<?php echo $singer["image"]?>" alt="avatar">
                            </div>
                        </td>
                        <td class="text-left"><?php echo $singer["name"]?></td>
                        <td class="text-left"><?php echo $singer["nation"]?></td>
                        <td class="text-center"><a href="index.php?menu=editsinger&id=<?php echo $singer["id"]?>"><i class="fas fa-edit"></i></a> | <a href="system/music.php?deleteSinger=<?php echo $singer["id"]?>"><i class="fas fa-trash-alt text-danger"></i></a></td>
                    </tr>
                <?php 
                } 
                ?>
                </tbody>
                
            </table>
            <!-- /.table -->
        </div>
        <!-- /.table-responsive -->
    </div>
</div>

<script>

</script>