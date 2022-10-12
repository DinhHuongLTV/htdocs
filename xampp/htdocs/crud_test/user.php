<?php
session_start();

// kiểm tra username có tồn tại ?
if (!isset($_SESSION["username"])) {
    $_SESSION["error"] = "Chưa đăng nhập, cần đăng nhập để tiếp tục";
    header("Location: ./logout.php");
    exit();
}
if (isset($_SESSION["success"])) {
    echo $_SESSION["success"];
    unset($_SESSION["success"]);
}
?>
<a href="logout.php">Logout</a>
<h1></h1>