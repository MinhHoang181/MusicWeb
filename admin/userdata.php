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
                    <!-- Add account -->
                    <div class="form-group">
                            <a href="index.php?menu=createprofile"><button class="btn btn-secondary"><i class="fa fa-user-plus"></i> Tạo tài khoản</button></a>
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
                data-query-params="queryParams"
                data-response-handler="responseHandler"
  
            >
                <!-- header -->
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" data-field="id" data-width="100">ID</th>
                        <th class="text-center" data-field="username" data-width="250">Tài khoản</th>
                        <th class="text-center" data-field="email" data-width="250">Email</th>
                        <th class="text-center" data-field="password" data-width="200">Password</th>
                        <th class="text-center" data-field="user_type" data-width="100">Quyền hạn</th>
                        <th class="text-center" data-field="action" data-width="100">Tác vụ</th>
                    </tr>
                </thead>   
                <tbody>
                <!-- In tat ca user -->
                <?php
                $result = GetAllUser();
                while ($user = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $user["id"]?></td>
                        <td class="text-left"><?php echo $user["username"]?></td>
                        <td class="text-left"><?php echo $user["email"]?></td>
                        <td>
                            <input class="passwordShow text-left" type="password" value="<?php echo $user["password"]?>" id="password<?php echo $user["id"]?>" disabled>
                            <i class="showPasswordBtn fas fa-eye"></i>
                        </td>
                        <td class="text-center"><?php echo $user["user_type"]?></td>
                        <td class="text-center"><a href="index.php?menu=editprofile&username=<?php echo $user["username"]?>"><i class="fas fa-edit"></i></a> | <a href="system/account.php?deleteAccount=<?php echo $user["id"]?>"><i class="fas fa-trash-alt text-danger"></i></a></td>
                    </tr>
                <?php 
                } 
                ?>
                </tbody>
                
            </table>
            <!-- /.table -->
        </div>
        <!-- /.col -->
    </div>
</div>

<script>
$("document").ready(function() {
    // Show/Hide password khi an nut Show
    $(".showPasswordBtn").on("mousedown", function() {
        $(this).closest("td").find(".passwordShow").prop("type", "text");
    }).on("mouseup", function() {
        $(this).closest("td").find(".passwordShow").prop("type", "password");
    });
});

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