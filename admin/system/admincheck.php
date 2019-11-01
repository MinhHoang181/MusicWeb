<?php 
    session_start();
    if (isset($_SESSION["user"])) {
        if ($_SESSION["user"]["user_type"] != "admin") {
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../login.php");
    }
?>