<?php
    // PHP Dang nhap tai khoan, kiem tra trong database
    //
    //
    //  Ket noi database
    require_once("connect.php");

    // Lay thong tin tu form dang nhap
    if (isset($_POST["loginBtn"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        // Cau lenh SQL kiem tra thong tin tren database
        $sql = "SELECT * FROM account WHERE username='$username' AND password='$password'";
        $query = mysqli_query($conn,$sql);
    
        // Neu khong ton tai thi xuat loi, thanh cong thi toi trang index
        if (mysqli_num_rows($query) == 0) {
            echo "fail";
        } else {
            //header("Location: ../index.html");
            echo "success";
        }
    } 
?>