<?php
session_start();
echo "<pre>";
print_r($_POST);
echo "</pre>";

$error = "";
$result = "";

if (isset($_POST["Submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $error = "Chưa nhập username / password";
    } else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = "Username không đúng định dạng (phải là email)";
    }

    if (empty($error)) {
        if (strcmp($username, "huongdao916@gmail.com") == 0 && $password == 12345) {
            $_SESSION["username"] = $username;
            $_SESSION["success"] = "Chúc mừng, bạn đã đăng nhập thành công";
            header("Location: ./welcome.php");
            exit();
        } else if (strcmp($username, "huongdao916@gmail.com") != 0) {
            $error = "Sai username";
        } else if ($password != 12345) {
            $error = "Sai mật khẩu";
        }
    }
}
?>



<h3 style="color: orange">
    <?php
    echo $error;
    ?>
</h3>
<h3 style="color: cadetblue">
    <?php
    echo $result;
    ?>
</h3>
<h3 style="color: cadetblue">
    <?php
    if (isset($_SESSION["success"])) {
        echo $_SESSION["success"];
        unset($_SESSION["success"]);
    }
    ?>
</h3>
<h3 style="color: orange">
    <?php
    if (isset($_SESSION["error"])) {
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
    }
    ?>
</h3>

<link rel="stylesheet" href="style.css">
<form action="" method="POST">
    <div class="input__field">
        <label for="username">Username:</label>
        <input type="text" name="username">
    </div>
    <div class="input__field">
        <label for="password">Password:</label>
        <input type="password" name="password">
    </div>
    <div class="input__field">
        <input type="submit" name="Submit" value="Đăng nhập">
    </div>
</form>