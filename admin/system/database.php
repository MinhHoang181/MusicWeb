<?php 
    require_once("connect.php");

    ///////////////////////////////////////////////////////
   //                                                   //
  //              ACCOUNT                              //
 //                                                   //
///////////////////////////////////////////////////////
    
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

    ///////////////////////////////////////////////////////
   //                                                   //
  //              MUSIC                                //
 //                                                   //
///////////////////////////////////////////////////////

// Ham ley het thong tin tat ca bai hat
function GetAllMusic() {
    global $conn;
    $sql = "SELECT * FROM music";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function GetMusicById($id) {
    global $conn;
    $sql = "SELECT * FROM music WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    $music = mysqli_fetch_assoc($result);
    return $music;
}

    ///////////////////////////////////////////////////////
   //                                                   //
  //              CATEGORIES_MUSIC                     //
 //                                                   //
///////////////////////////////////////////////////////

// Ham lay het the loai cua mot bai hat
function GetAllCategoryOfMusic($id_music) {
    global $conn;
    $sql = "SELECT * FROM categories_music WHERE id_music = '$id_music'";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function GetAllMusicOfCategory($id_category) {

}

    ///////////////////////////////////////////////////////
   //                                                   //
  //              CATEGORIES                           //
 //                                                   //
///////////////////////////////////////////////////////

// Ham lay het tat ca cac the loai
function GetAllCategory() {
    global $conn;
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn,$sql);
    return $result;
}

// Ham lay ten the loai thong qua ID
function GetNameCategory($id) {
    global $conn;
    $sql = "SELECT name FROM categories WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    $name = mysqli_fetch_assoc($result);
    return $name["name"];
}

    ///////////////////////////////////////////////////////
   //                                                   //
  //              TOPIC                                //
 //                                                   //
///////////////////////////////////////////////////////

function GetAllTopic() {
    
}
?>

