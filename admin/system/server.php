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
            header("Location: ../login.php");
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
        $username = $_POST["username"];
        $password_1 = $_POST["password1"];
        $email = $_POST["email"];
        // Cau lenh SQL luu vao trong database
        $sql = "INSERT INTO account( username, password, email, user_type)
                VALUES ('$username', '$password_1', '$email', 'user')";           
        // Neu loi thi xuat loi, ko thi chuyen toi trang index
        if ($conn->query($sql) === FALSE) {
            $_SESSION["register_error"] = "Lỗi không thể đăng ký, vui lòng thử lại";
        } else {
            $_SESSION["user"] = GetUserByUsername($username);
            header("Location: ../../index.php");
        }
    }    

?>