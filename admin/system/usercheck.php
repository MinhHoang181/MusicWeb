<?php 
    if (isset($_SESSION["user"])) {
        if ($_SESSION["user"]["user_type"] != "user") {
        }
    } else {
        header("Location: login.php");
    }
?>