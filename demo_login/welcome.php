<?php
session_start();

// ! user only access this site when they has logged in
// ! base on $_SESSION["username"]
echo "<pre>";
print_r($_SESSION);
echo "</pre>";


// Nếu chưa đăng nhập thì chuyển hướng lại trang login
// nếu mà dùng trình duyệt ẩn thì phải dùng dòng sau để tránh bị truy cập vào trang welcome do chưa đăng nhập
if (!isset($_SESSION["username"])) {
    $_SESSION["error"] = "You don't login yet";
    header("Location: ./login.php");
    exit();
}
?>

<!-- // ! show user when login successfully -->
<h2 style="color: blueviolet;">
    <?php
    // we use flash message to welcome, flash message only shows up once 
    if (isset($_SESSION["success"])) {
        echo $_SESSION["success"];
        unset($_SESSION["success"]);
    }
    ?>
</h2>
<h1 style="color: cornflowerblue">
    <?php echo "Hello, " . $_SESSION["username"] ?>
</h1>
<a class="btn" href="logout.php">Logout</a>









<style>
    * {
        font-family: "Poppins";
    }

    .btn {
        display: inline-block;
        text-decoration: none;
        list-style: none;
        color: #333;
        font-weight: bold;
        border: none;
        padding: 16px 0;
        border-radius: 50px;
        min-width: 160px;
        text-align: center;
        background-color: #3DC4FF;
    }
</style>