<?php
session_start();

echo "<pre>";
print_r($_POST);
echo "</pre>";

$errorUsername = "";
$errorPassword = "";
$result = "";

if (isset($_COOKIE["username"])) {
    $_SESSION["username"] = $_COOKIE["username"];
    header("Location: ./welcome.php");
    exit();
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($username)) {
        $errorUsername = "Không để trống username";
    } else if (empty($password)) {
        $errorPassword = "Không để trống password";
    } else if (strcmp($username, "admin") != 0) {
        $errorUsername = "Sai tên đăng nhập";
    } else if (strcmp($password, "12345")) {
        $errorPassword = "Sai mật khẩu";
    }

    if (isset($_POST["remember"])) {
        setcookie("username", $username, time() + 600);
    }
    if (empty($errorUsername) && empty($errorPassword)) {
        $_SESSION["username"] = $username;
        $_SESSION["success"] = "Đăng nhập thành công";
        header("Location: ./welcome.php");
        exit();
    }
}
?>

<!-- // ! mình hiểu tại sao khi đổ dữ liệu ra form phải dùng $_POST chứ không dùng biến như là $username hay $password rồi: do -->
<!-- // ! biến $username hay $password phụ thuộc vào sự tồn tại của $_POST tương ứng mà khi chưa tồn tại mà đã gán thì sẽ lỗi -->
<!DOCTYPE html>

<h3 style="color: orange">
    <?php
    if (isset($_SESSION["error"])) {
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
    }
    ?>
</h3>
<h3 style="color:darkseagreen">
    <?php
    if (isset($_SESSION["success"])) {
        echo $_SESSION["success"];
        unset($_SESSION["success"]);
    }
    ?>
</h3>
<link rel="stylesheet" href="style.css">
<form action="" method="POST">
    <div class="input__field">
        <label for="u">Username:</label>
        <input id="u" type="text" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : "" ?>">
        <p style="color:crimson; font-size: 12px;"><?php echo $errorUsername ?></p>
    </div>
    <div class="input__field">

        <label for="p">Password:</label>
        <input type="password" name="password" id="p" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : "" ?>">
        <p style="color:crimson; font-size: 12px;"><?php echo $errorPassword ?></p>
    </div>
    <div class="input__field flex-row">
        <input id="r" type="checkbox" name="remember">
        <label for="r">Remember me</label>
    </div>
    <div class="input__field">
        <input type="submit" value="Login" name="submit">
    </div>
</form>