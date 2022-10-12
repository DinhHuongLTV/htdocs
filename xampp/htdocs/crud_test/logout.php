<?php
session_start();
unset($_SESSION["username"]);
if (!isset($_SESSION["error"])) {
    $_SESSION["success"] = "Đăng xuất thành công";
}

header("Location: ./login.php");
exit();
