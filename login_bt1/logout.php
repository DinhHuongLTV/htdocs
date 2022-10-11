
<?php
session_start();
unset($_SESSION["username"]);
$_SESSION["success"] = "Bạn đã đăng xuất thành công !";
header("Location: ./login.php");
exit();
?>