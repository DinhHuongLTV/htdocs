<!-- // ! trình duyệt ẩn không lưu lại sessions hay cookies vì vậy phải kiểm tra xem username có tồn tại hay không -->
<?php

session_start();
if (isset($_COOKIE["username"])) {
    $_SESSION["success"] = "You've logged in by remember me";
    $_SESSION["username"] = $_COOKIE["username"];
    header("Location: ./welcome.php");
    exit();

    // logic code này và logic code chuyển hướng khi chưa đăng nhập ở file welcome sẽ tạo ra infinite loop 
}
// Đăng nhập rồi thì chuyển thẳng tới trang welcome
if (isset($_SESSION["username"])) {
    $_SESSION["success"] = "You've logged in";
    header("Location: ./welcome.php");
    exit();
}
// TODO 1
echo "<pre>";
print_r($_POST);
echo "</pre>";

// TODO 2
$error = "";
$result = "";

// TODO 3
if (isset($_POST["submit"])) {
    // TODO 4
    $username = $_POST["username"];
    $password = $_POST["password"];

    // TODO 5: no fields is empty, username must be email
    if (empty($username) || empty($password)) {
        $error = "Username and password are required";
    } else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = "Username must be your email";
    }

    // TODO 6
    if (empty($error)) {
        // TODO: login process, use Cookies to save data, only happends when login
        // todo successfully
        // * we use password to login is 123 to demonstate
        if ($password == 123) {
            // ? when login successfully

            // !we only save user's data when user tick remember me
            if (isset($_POST["remember"])) {
                // $_COOKIE["username"] = $username;
                setcookie("username", $username, time() + 3600);
                // chỉ lưu username vì chỉ cần username là biết được user đã đăng nhập hay chưa
                // mật khẩu lưu vào cookie sẽ rất dễ bị lộ
                // $_COOKIE["password"] = $password;
            }
            // ? we use section because we're gonna use username in another files
            $_SESSION["username"] = $username;
            $_SESSION["success"] = "Congrats! You've logged in";
            // ! navigate to welcome.php
            header("Location: ./welcome.php");
            exit(); // to be sure the navigation has no error
            // echo "<pre>";
            // print_r($_SESSION);
            // echo "</pre>";
        } else {
            $error = "Wrong username / password";
        }
    }
}
?>

<!-- // TODO 7 -->
<h2 style="color: orange"><?php echo $error; ?></h2>
<h2 style="color: green"><?php echo $result; ?></h2>
<h3 style="color: crimson">
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
</h3>

<h1>Login</h1>
<form action="" method="post">
    <div class="input__field">
        <label for="">Username: </label>
        <input type="text" name="username">
    </div>
    <div class="input__field">
        <label for="">Password:</label>
        <input type="password" name="password">
    </div>
    <div class="input__field">
        <!-- // * if only has one checkbox input, we can use normal name instead of array -->
        <input id="remember" type="checkbox" name="remember">
        <label for="remember">Remember me</label>
    </div>
    <div class="input__field">
        <input type="submit" value="Login" name="submit">
    </div>
</form>

<style>
    * {
        font-family: "Poppins";
    }

    .input__field {
        display: flex;
    }

    .input__field+.input__field {
        margin-top: 16px;
    }

    .input__field label {
        min-width: 100px;
    }

    .input__field input {
        border: 1.5px solid rgba(0, 0, 0, 0.5);
        outline: none;
    }
</style>