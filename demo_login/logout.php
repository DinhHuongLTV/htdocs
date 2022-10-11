<?php
session_start();
// xóa session tạo ra lúc đăng nhập
unset($_SESSION["username"]);
// và xóa cả cookie
setcookie("username", "", time() - 1);
// chuyển hướng lại về trang login
$_SESSION["success"] = "You've logged out successfully";
header("Location: ./login.php");
exit();
