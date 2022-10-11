<?php
session_start();
// xóa session
unset($_SESSION["username"]);
setcookie("username", "", time() - 1);
$_SESSION["success"] = "Đăng xuất thành công";
header("Location: ./login.php");
exit();
