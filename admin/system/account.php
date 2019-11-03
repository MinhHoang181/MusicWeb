<?php
    // Tao moi hoac mo session da ton tai
    session_start();
    // Ket noi database
    require_once("database.php");

    // PHP Dang nhap tai khoan, kiem tra trong database
    //
    // Lay thong tin tu form dang nhap
    if (isset($_POST["loginBtn"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        // Cau lenh SQL kiem tra thong tin tren database
        $sql = "SELECT * FROM account WHERE username='$username' AND password='$password'";
        $query = mysqli_query($conn,$sql);
        // Neu khong ton tai thi xuat loi, thanh cong thi toi trang index
        if (mysqli_num_rows($query) == 0) {
            $_SESSION["login_error"] = "Sai tên đăng nhập hoặc mật khẩu";
            header("Location: ../../login.php");
        } else {
            $_SESSION["user"] = GetUserByUsername($username);
            header("Location: ../../index.php");
        }
    } 

    // PHP Dang ky tai khoan moi, luu vao trong database
    //
    // Kiem tra tai khoan ton tai
    if (isset($_POST["username_check"])) {
        $usernameCheck = $_POST["usernameCheck"];
        $sql = "SELECT * FROM account WHERE username='$usernameCheck'";
        $result = mysqli_query($conn,$sql);

        // Neu ko co thi tra ve response = not_taken va nguoc lai
        if (mysqli_num_rows($result) == 0) {
            echo "not_taken";
        } else {
            echo "taken";
        }
        exit();
    }
    // Kiem tra email ton tai
    if (isset($_POST["email_check"])) {
        $emailCheck = $_POST["emailCheck"];
        $sql = "SELECT * FROM account WHERE email='$emailCheck'";
        $result = mysqli_query($conn,$sql);
        // Neu ko co thi tra ve response = not_taken va nguoc lai
        if (mysqli_num_rows($result) == 0) {
            echo "not_taken";
        } else {
            echo "taken";
        }
        exit();
    }
    // Lay thong tin tu form dang ky
    if (isset($_POST["registerBtn"])) {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password_1 = $_POST["password1"];
        $email = $_POST["email"];
        // Cau lenh SQL luu vao trong database
        $sql = "INSERT INTO account(fullname, username, password, email, user_type)
                VALUES ('$fullname', '$username', '$password_1', '$email', 'user')";           
        // Neu loi thi xuat loi, ko thi chuyen toi trang index
        if ($conn->query($sql) === FALSE) {
            $_SESSION["register_error"] = "Lỗi không thể đăng ký, vui lòng thử lại";
        } else {
            $_SESSION["user"] = GetUserByUsername($username);
            header("Location: ../../index.php");
        }
    }

    // PHP Admin tao tai khoan
    //
    // Lay thong tin tu form tao tai khoan
    if (isset($_POST["createBtn"])) {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $user_type = $_POST["user_type"];
        // Luu file anh
        if ($_FILES["avatar"]["name"] != "") {
            $avatar = $_FILES["avatar"]["name"];
            $temp_name = $_FILES["avatar"]["tmp_name"];
            $location = "../../images/" . $avatar;      
            if (!file_exists($location)) {
                if(!move_uploaded_file($temp_name, $location)){
                    $_SESSION["create_fail"] = "Lỗi upload ảnh, vui lòng thử lại";
                    header("Location: ../index.php?menu=createprofile");
                }
            }
        } else {
            $avatar = "guestAvatar.jpeg";
        }
        // Cau lenh SQL luu vao trong database
        $sql = "INSERT INTO account(fullname, username, password, email, user_type, avatar)
                VALUES ('$fullname', '$username', '$password', '$email', '$user_type', '$avatar')";           
        // thong bao ket qua va chuyen toi trang createprofile
        if ($conn->query($sql) === FALSE) {
            $_SESSION["create_fail"] = "Lỗi không thể tạo tài khoản, vui lòng thử lại";
        } else {
            $_SESSION["create_success"] = "Tạo tài khoản thành công";  
        }
        header("Location: ../index.php?menu=createprofile");
    } 

    // PHP Cap nhat tai khoan, luu vao trong database
    //
    // Lay thong tin tu form cap nhat
    if (isset($_POST["editBtn"])) {
        $username = $_POST["username"];
        $fullname = $_POST["fullname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $user_type = $_POST["user_type"];
        $avatar = $_POST["avatar"];
        // Luu file anh
        if ($_FILES["avatarFile"]["name"] != "") {
            $avatar = $_FILES["avatarFile"]["name"];
            $temp_name = $_FILES["avatarFile"]["tmp_name"];
            $location = "../../images/" . $avatar;      
            if (!file_exists($location)) {
                if(!move_uploaded_file($temp_name, $location)){
                    $avatar = $_POST["avatar"];
                    $_SESSION["edit_fail"] = "Lỗi cập nhật, vui lòng thử lại";
                }
            }
        } 
        // Cau lenh SQL cap nhat
        $sql = "UPDATE account
                SET fullname='$fullname', password='$password', email='$email', user_type='$user_type', avatar='$avatar'
                WHERE username='$username'";
        // ve lai trang cap nhat va thong bao ket qua
        if ($conn->query($sql) == FALSE) {
            $_SESSION["edit_fail"] = "Lỗi cập nhật, vui lòng thử lại";
        } else {
            $_SESSION["edit_success"] = "Cập nhật thành công";
        }
        header("Location: ../index.php?menu=editprofile&username=".$username);
    }

    // PHP Xoa tai khoan khoi database
    //
    // lay id tu $_GET gui toi
    if (isset($_GET["deleteAccount"]) && $_SESSION["user"]["user_type"] == "admin") {
        $id = $_GET["deleteAccount"];
        $sql = "DELETE FROM account WHERE id='$id'";
        if ($conn->query($sql) == FALSE) {
            $_SESSION["delete_account_error"] = "Xoá bị lỗi, vui lòng thử lại";
        } 
        header("Location: ../index.php?menu=userdata");
    }
?>