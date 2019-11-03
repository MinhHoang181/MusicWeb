<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
?>

<div class="container">
    <div class="row">
        <!-- Table -->
        <div class="table-responsive">
            <!-- Toolbar -->
            <div id="toolbar">
                <div class="form-inline" role="form">
                    <!-- Add music -->
                    <div class="form-group">
                            <a href="index.php?menu=addmusic"><button class="btn btn-secondary"><i class="fas fa-music"></i> Thêm bài hát</button></a>
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
                        <th class="text-center" data-field="name" data-width="250">Tên bài hát</th>
                        <th class="text-center" data-field="singer" data-width="200">Ca sĩ</th>
                        <th class="text-center" data-field="category" data-width="200">Thể loại</th>
                        <th class="text-center" data-field="views" data-width="150">Lượt nghe</th>
                        <th class="text-center" data-field="action" data-width="100">Tác vụ</th>
                    </tr>
                </thead>   
                <tbody>
                <!-- In tat ca bai hat -->
                <?php
                $result = GetAllMusic();
                while ($music = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td class="text-center"><?php echo $music["id"]?></td>
                        <td class="text-left"><?php echo $music["name"]?></td>
                        <td class="text-left"><?php echo $music["singer"]?></td>
                        <td class="text-left">
                            <?php
                            $categories = GetAllCategoryOfMusic($music["id"]);
                            while ($category = mysqli_fetch_assoc($categories)) {
                                echo GetNameCategory($category["id_category"]) . ", ";
                            }
                            ?>
                        </td>
                        <td class="text-center"><?php echo $music["views"]?></td>
                        <td class="text-center"><a href="index.php?menu=editmusic&id=<?php echo $music["id"]?>"><i class="fas fa-edit"></i></a> | <a href="system/music.php?removeMusic=<?php echo $music["id"]?>"><i class="fas fa-trash-alt text-danger"></i></a></td>
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
function queryParams() {
    var params = {}
    $('#toolbar').find('input[name]').each(function () {
      params[$(this).attr('name')] = $(this).val()
    })
    return params
}

function responseHandler(res) {
return res.rows
}
</script>