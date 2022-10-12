<?php
require_once "connection.php";
// session_start();

$errorName = "";
$errorPass = "";
$success = "";
$error = "";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)) {
        $errorName = "Không được để trống";
    } else if (str_contains($username, "admin")) {
        $errorName  = "Không thể tạo tài khoản admin";
    } else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $errorName = "Phải là email";
    } else if (strlen($username) <  10) {
        $errorName = "Phải có ít nhất 15 ký tự";
    }
    if (empty($password)) {
        $errorPass = "Không được để trống";
    } else if (strlen($password) < 5) {
        $errorPass = "Chứa ít nhất 5 ký tự";
    }

    if (empty($errorName) && empty($errorPass)) {
        $sql_insert = "INSERT into user(username, password) values('$username', '$password')";
        $isInserted = mysqli_query($connection, $sql_insert);
        if ($isInserted) {
            $success = "Thêm thành công";
        } else {
            $error = "Thêm thất bại";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create user</title>
</head>

<body>
    <h2 class="success">
        <?php
        echo $success;
        ?>
    </h2>
    <h2 class="error2">
        <?php
        echo $error;
        ?>
    </h2>
    <form action="" method="POST">
        <h2>Create user</h2>
        <div class="input__field">
            <label for="">Username: </label>
            <input type="text" name="username" id="">
            <p class="error">
                <?php
                echo $errorName;
                ?>
            </p>
        </div>
        <div class="input__field">
            <label for="">Password: </label>
            <input type="password" name="password" id="">
            <p class="error">
                <?php
                echo $errorPass;
                ?>
            </p>
        </div>
        <div class="input__field">
            <input type="submit" value="Create" name="submit">
        </div>
    </form>
    <a href="admin.php">To admin page</a>
</body>

</html>