<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$_SESSION["date"] = date("m/d/y");

if (isset($_COOKIE["username"])) {
    $_SESSION["username"] = $_COOKIE["username"];
}

if (!isset($_SESSION["username"])) {
    $_SESSION["error"] = "Bạn chưa đăng nhập, hãy đăng nhập để tiếp tục";
    header("Location: ./login.php");
    exit();
}
// tự nhiên lại ra nhiều vấn đề vãi cả chưởng, mày quên mất làm thế nào để hiển thị chào mừng 1 lần rồi (nhớ rồi haha) :)
if (isset($_SESSION["success"])) {
    $welcome = $_SESSION["success"] . "</br>Chào mừng " . $_SESSION["username"];
    unset($_SESSION["success"]);
} else {
    $welcome = "Chào mừng " . $_SESSION["username"];
}
?>
<h3 style="color:cornflowerblue">
    <?php
    echo $welcome . "<br>";
    echo "Ngày đăng nhập: " . $_SESSION["date"];
    ?>
</h3>
<a href="logout.php">Logout</a>