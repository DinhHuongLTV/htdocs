<?php
require_once "connection.php";
session_start();

// debug
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


$errorPass = "";
$errorName = "";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)) {
        $errorName = "Username must be enterd";
    } else if (!filter_var($username, FILTER_VALIDATE_EMAIL) && strcmp($username, "admin")) {
        $errorName = "Username must be email";
    }
    if (empty($password)) {
        $errorPass = "Password is required";
    }

    if (empty($errorName) && empty($errorPass)) {
        // truy van database
        $sql_selectUser = "SELECT * from user where username = '$username'";
        $sql_selectAdmin = "SELECT * from admin where username = '$username'";
        $selectUser = mysqli_query($connection, $sql_selectUser);
        $selectAdmin = mysqli_query($connection, $sql_selectAdmin);
        // var_dump($selectUser);
        // var_dump($selectAdmin);
        $dataUser = mysqli_fetch_assoc($selectUser);
        $dataAdmin = mysqli_fetch_assoc($selectAdmin);
        if (isset($dataUser)) {
            if (!strcmp($password, $dataUser["password"])) {
                $_SESSION["username"] = $username;
                $_SESSION["success"] = "Chúc mừng bạn đã đăng nhập thành công";
                header("Location: ./user.php");
                exit();
            } else {
                $errorPass = "Wrong password";
            }
        } else if (isset($dataAdmin)) {
            if (!strcmp($password, $dataAdmin["password"])) {
                $_SESSION["username"] = $username;
                $_SESSION["success"] = "Chúc mừng admin đã đăng nhập thành công";
                header("Location: ./admin.php");
                exit();
            } else {
                $errorPass = "Wrong password";
            }
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
    <title>Document</title>
</head>

<body>
    <p class="error2">
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }
        if (isset($_SESSION["success"])) {
            echo $_SESSION["success"];
            unset($_SESSION["success"]);
        }
        ?>
    </p>
    <form action="" method="POST">
        <h2>login to your account</h2>
        <div class="input__field">
            <input type="text" name="username" id="" placeholder="Username" autocomplete="off">
            <p class="error"><?php echo $errorName ?></p>
        </div>
        <div class="input__field">
            <input type="password" name="password" id="" placeholder="Password">
            <p class="error"><?php echo $errorPass ?></p>
        </div>
        <div class="input__field">
            <input type="submit" value="Login" name="submit">
        </div>

    </form>
</body>

</html>