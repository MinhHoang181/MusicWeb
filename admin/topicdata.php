<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
?>

<div class="container">
    <div class="row">
        <!-- Category -->
        <div class="Category table-responsive col-12 col-sm-12 col-md-6">
            <!-- thong bao-->
            <?php 
            if (isset($_SESSION["category_success"])) { 
            ?>
                <div class="alert alert-success alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a> 
                <?php 
                echo $_SESSION["category_success"];
                unset($_SESSION["category_success"]); 
                ?>
                </div>
            <?php 
            } else if (isset($_SESSION["category_fail"])) { 
            ?>
                <div class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a> 
                <?php 
                echo $_SESSION["category_fail"];
                unset($_SESSION["category_fail"]);
                ?>
                </div>
            <?php
            }
            ?>
            <!-- Toolbar -->
            <div id="toolbarCategory">
                <div class="form-inline" role="form">
                    <!-- Add category -->
                    <div class="form-group">
                        <button class="btn btn-secondary" data-toggle="collapse" href="#collapseAddCategory" aria-expanded="false" aria-controls="collapseAddCategory"><i class="fas fa-music"></i> Thêm thể loại</button>
                    </div>
                </div>
            </div>
            <!--Them the loai -->
            <div class="collapse pt-3" id="collapseAddCategory">
                <form action="system/music.php" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="ID" name="idCategory" required>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Tên thể loại" name="nameCategory" required>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-secondary" type="submit" name="createCategoryBtn">Thêm</button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            <!-- Sua the loai -->
            <div class="collapse pt-3" id="collapseEditCategory">
                <form id="editCategoryForm" action="system/music.php" method="POST">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" id="idEditCategory" class="form-control" placeholder="ID" name="idCategory" readonly>
                        </div>
                        <div class="col-6">
                            <input type="text" id="nameEditCategory" class="form-control" placeholder="Tên thể loại" name="nameCategory" required>
                        </div>
                        <div class="col-1">
                            <button id="refreshEditCategoryBtn" class="btn btn-secondary" type="button" disabled><i class="fas fa-redo"></i></button>
                        </div>
                        <div class="col-2">
                            <button id="updateEditCategoryBtn" class="btn btn-secondary" type="submit" name="editCategoryBtn" disabled>Sửa</button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            <!-- data table -->
            <table 
                data-classes="table table-bordered table-hover"
                data-toggle="table"
                data-locale="vi-VN"

                data-search="true"

                data-button-icon = "true"
                data-show-button-text="true"

                data-pagination = "true"
                data-show-extended-pagination="true"
                data-pagination-loop="false"
                data-page-list = "[10, 25, 50, 100, All]"

                data-toolbar="#toolbarCategory"
            >
                <!-- header -->
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" data-field="id" data-width="100">ID</th>
                        <th class="text-center" data-field="name" data-width="250">Tên thể loại</th>
                        <th class="text-center" data-field="action" data-width="100">Tác vụ</th>
                    </tr>
                </thead>   
                <tbody>
                <!-- In tat ca the loai -->
                <?php
                $result = GetAllCategory();
                while ($category = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td class="idCategory text-center"><?php echo $category["id"]?></td>
                        <td class="nameCategory text-left"><?php echo $category["name"]?></td>
                        <td class="text-center"><a class="editCategoryBtn" data-toggle="collapse" href="#collapseEditCategory" aria-expanded="false" aria-controls="collapseEditCategory"><i class="fas fa-edit"></i></a> | <a href="system/music.php?removeCategory=<?php echo $category["id"]?>"><i class="fas fa-trash-alt text-danger"></i></a></td>
                    </tr>
                <?php 
                } 
                ?>
                </tbody>
                
            </table>
            <!-- /.table -->
        </div>
        <!-- /.Category -->

        <!-- Topic -->
        <div class="Topic table-responsive col-12 col-sm-12 col-md-6">
            <!-- Toolbar -->
            <div id="toolbarTopic">
                <div class="form-inline" role="form">
                    <!-- Add topic -->
                    <div class="form-group">
                            <a href="#"><button class="btn btn-secondary"><i class="fas fa-music"></i> Thêm chủ đề</button></a>
                    </div>
                </div>
            </div>
            <!-- data table -->
            <table 
                data-classes="table table-bordered table-hover"
                data-toggle="table"
                data-locale="vi-VN"

                data-search="true"

                data-button-icon = "true"
                data-show-button-text="true"

                data-pagination = "true"
                data-show-extended-pagination="true"
                data-pagination-loop="false"
                data-page-list = "[10, 25, 50, 100, All]"

                data-toolbar="#toolbarTopic"
            >
                <!-- header -->
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" data-field="id" data-width="100">ID</th>
                        <th class="text-center" data-field="name" data-width="250">Tên chủ đề</th>
                        <th class="text-center" data-field="action" data-width="100">Tác vụ</th>
                    </tr>
                </thead>   
                <tbody>
                <!-- In tat ca the loai -->
                <?php
                $result = GetAllTopic();
                //while ($topic = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td class="text-center"><?php //echo $topic["id"]?></td>
                        <td class="text-left"><?php //echo $topic["name"]?></td>
                        <td class="text-center"><a href="#"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash-alt text-danger"></i></a></td>
                    </tr>
                <?php 
                //} 
                ?>
                </tbody>
                
            </table>
            <!-- /.table -->
        </div>
        <!-- /.Topic -->
    </div>
</div>

<script>
$("document").ready(function() {
    var id;
    var name;

    // Khi click vao nut edit Category
    $(".editCategoryBtn").on("click", function() {
        id = $(this).closest("tr").find(".idCategory").text();
        name = $(this).closest("tr").find(".nameCategory").text();

        $("#idEditCategory").val(id);
        $("#nameEditCategory").val(name);
    });

    // Khi thay doi thong tin the loai
    $("#editCategoryForm :input").on("input", function() {
        $("#refreshEditCategoryBtn").prop("disabled", false);
        $("#updateEditCategoryBtn").prop("disabled", false);
    });

    // Khi an nut refresh
    $("#refreshEditCategoryBtn").on("click", function() {
        $("#idEditCategory").val(id);
        $("#nameEditCategory").val(name);

        $("#refreshEditCategoryBtn").prop("disabled", true);
        $("#updateEditCategoryBtn").prop("disabled", true);
    });
});
</script>