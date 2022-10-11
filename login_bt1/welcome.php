<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
if (isset($_SESSION["username"])) {
    $username__temp = $_SESSION["username"];
    $welcome = substr($username__temp, 0, strpos($username__temp, "@"));
} else {
    $_SESSION["error"] = "Vui lòng đăng nhập để tiếp tục";
    header("Location: ./login.php");
    exit();
}


?>

<h1 style="color: cornflowerblue">
    <?php
    if (!empty($welcome)) {
        echo "Xin chào " . $welcome;
        $welcome = "";
    }
    ?>
</h1>
<a href="logout.php">Đăng xuất</a>
<!-- // $mystring = 'abc';
// $findme = 'a';
// $pos = strpos($_SESSION["username"], "@");
// $result = substr($_SESSION["username"], 0, $pos);
// echo $result;
// Note our use of ===. Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
// if ($pos === false) {
// echo "The string '$findme' was not found in the string '$mystring'";
// } else {
// echo "The string '@' was found in the string '$mystring'";
// echo " and exists at position $pos";
// } -->