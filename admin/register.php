<?php
    // PHP Dang ky tai khoan moi, luu vao trong database
    //
    //
    //Ket noi database
    require_once("connect.php");

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
        $password_2 = $_POST["password2"];
        $email = $_POST["email"];
  
        // Cau lenh SQL luu vao trong database
        $sql = "INSERT INTO account( username, password, email)
                VALUES ('$username', '$password_1', '$email')";
                
        // Neu loi thi xuat loi, ko thi chuyen toi trang index
        if ($conn->query($sql) === FALSE) {
            die("Error: " . $sql . $conn->error);
        } else {
            header("Location: ../index.html");
        }
    }    
?>