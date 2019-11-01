<?php 
    require_once("connect.php");

// Ham lay het thong tin cua user thong qua username tren database
function GetUserByUsername($username) {
    global $conn;
    $sql = "SELECT * FROM account WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($result);
    return $user;
}

// Ham lay het thong tin cua user thong qua id tren database
function GetUserById($id) {
    global $conn;
    $sql = "SELECT * FROM account WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($result);
    return $user;
}

// Ham lay het thong tin tat ca user
function GetAllUser() {
    global $conn;
    $sql = "SELECT * FROM account";
    $result = mysqli_query($conn,$sql);
    return $result;
}
?>