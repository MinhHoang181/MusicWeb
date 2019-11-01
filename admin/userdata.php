<?php 
    require_once("system/admincheck.php");
    require_once("system/database.php");
?>

<div class="container">
    <div class="row">
        <!-- Table -->
        <div class="col-10 table-responsive">
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
            >
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
                        <td class="text-center idUser"><?php echo $user["id"]?></td>
                        <td class="text-left"><?php echo $user["username"]?></td>
                        <td class="text-left"><?php echo $user["email"]?></td>
                        <td>
                            <input class="w-50 text-left" type="password" value="<?php echo $user["password"]?>" id="password<?php echo $user["id"]?>" disabled>
                            <label>| <a class="text-decoration-none" href="#" onmousedown="Show('password<?php echo $user['id']?>')" onmouseup="Hide('password<?php echo $user['id']?>')">Show</a></label>
                        </td>
                        <td class="text-center"><?php echo $user["user_type"]?></td>
                        <td class="text-center"><a class="text-decoration-none editUserProfile" href="index.php?menu=editprofile&username=<?php echo $user["username"]?>">Sửa</a> | <a class="text-decoration-none" href="#">Xoá</a></td>
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
function Show(id) {
    var obj = document.getElementById(id);
    obj.type = "text";
}
function Hide(id) {
    var obj = document.getElementById(id);
    obj.type = "password";
}
</script>