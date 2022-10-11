<?php
//echo 'Hello';
// 1 - Hàm
// + Là tập các dòng code xử lý logic
// + Tính chất quan trọng nhất của hàm là : sử dụng lại
// - Cú pháp khai báo: giống hệt JS, tham khảo lại phần hàm
//của JS
function showName($name)
{
    echo "Hello: $name";
}
showName('Kim Anh'); //Hello: Kim Anh
// ! 2 - Truyền biến vào hàm theo kiểu tham trị và tham chiếu: tham trị: viết tên biến như bình thường; tham chiếu thêm & đằng trước
// + Viết hàm để đổi giá trị của biến bên ngoài hàm
$number = 5;
echo "<br> Ban đầu biến number = $number (truyen tham tri)";
function changeNumber($num)
{
    $num = 1;
    echo "<br> Biến bên trong hàm = $num";
}
changeNumber($number);
echo "<br> Sau khi gọi hàm, biến number = $number"; //?
// * biến ban đầu không thay đổi giá trị sau khi gọi hàm 

echo "<br> Ban đầu biến number = $number (truyen tham chieu)";
function changeNumber2(&$num)
{
    $num = 1;
    echo "<br> Biến bên trong hàm = $num";
}
changeNumber2($number);
echo "<br> Sau khi gọi hàm, biến number = $number"; //?
// ! 3 - 1 số hàm nhúng file: include, include_once, require, require_once

// !when you include something that doesn't exist, it still rans but it will alert error from including line
include "something.txt";

echo "<br> code test nhung file";
// ?include 
// include 'test_embed.php';
// ?include_once
// !_once check if before this line your file is included yet, if yes it includes otherwise it doesn't 
// include_once 'test_embed.php';


// ! viết tắt câu lệnh điều kiện khi hiển thị 1 khối html phức tạp

// vd: dùng php hiển thị cấu trúc bảng 2 hàng, mỗi hàng 3 cột dựa theo 1 điều kiện nào đó

$isCheck = 3;

// //Hiển thị hoàn toàn bằng php
if ($isCheck) {
    echo '<table border="1" cellspacing="0" cellpadding = "10">';
    echo '<tr>';
    echo '<td>abce</td>';
    echo '<td>abce</td>';
    echo '<td>abce</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>123</td>';
    echo '<td>123</td>';
    echo '<td>123</td>';
    echo '</tr>';
    echo '</table>';
}

// * recommend tách biệt php - html
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($isCheck == 2) :
    ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <td>ABC</td>
                <td>ABC</td>
                <td>ABC</td>
            </tr>
            <tr>
                <td>CDE</td>
                <td>CDE</td>
                <td>CDE</td>
            </tr>
        </table>
    <?php
    elseif ($isCheck == 3) :
    ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <td>huong</td>
                <td>huong</td>
                <td>huong</td>
            </tr>
            <tr>
                <td>Dinh</td>
                <td>Dinh</td>
                <td>Dinh</td>
            </tr>
        </table>

    <?php endif; ?>
</body>

</html>

<?php
$number = 5;
// $number > 0 ? echo "number is bigger than zero" : echo "number is not bigger than zero"; 
echo $number > 0 ? "number is bigger than zero" : "number is not bigger than zero";
?>

<!-- vòng lặp, continue, break -->