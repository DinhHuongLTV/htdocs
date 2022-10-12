<?php
require_once "connection.php";
session_start();
if (!isset($_SESSION["username"])) {
    $_SESSION["error"] = "Chưa đăng nhập, cần đăng nhập để tiếp tục";
    header("Location: ./logout.php");
    exit();
}
if (isset($_SESSION["success"])) {
    echo $_SESSION["success"];
    unset($_SESSION["success"]);
}

// viết truy vấn 
$sql_selectAll = "SELECT * from user order by created_at desc";
// thực thi
$dataAll = mysqli_query($connection, $sql_selectAll);
// trả về mảng 2 chiều
$users = mysqli_fetch_all($dataAll, MYSQLI_ASSOC);
// echo "<pre>";
// print_r($users);
// echo "</pre>";
?>
<a href="logout.php">Logout</a>
<a href="create.php">Add user</a>
<h1></h1>

<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Password</th>
        <th>Created date</th>
        <th>Func</th>
    </tr>
    <?php
    foreach ($users as $user) :
    ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td>
                <?php
                echo date("d/m/Y H:i:s", strtotime($user['created_at']));
                ?>
            </td>
            <td>
                <a href="#">Sửa</a>
                /
                <a href="#">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>