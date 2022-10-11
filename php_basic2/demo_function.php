<?php
// ! hàm xử lý chuỗi
// * lấy độ dài chuỗi
$count = strlen("my name is Huong");
var_dump($count); // => 16

// * đếm số từ trong 1 chuỗi
$count1 = str_word_count("My name is Huong");
var_dump($count1); // => 4

// * viết hoa 
echo strtoupper("my name is Huong"); // => MY NAME IS HUONG

// * viết thường
echo strtolower("MY NAME IS HUONG"); // => my name is huong

// * viết hoa chữ cái đầu
echo ucfirst("dao dinh huong"); // => Dao dinh huong

// * cắt chuỗi
echo "<br>";
echo substr("my name is dao dinh huong", 3, 9); // => name is d

// ! thao tác với số
echo "<br>";
$check = is_numeric("abc");
var_dump($check); // => bool(false)

// * làm tròn theo phần thập phân 
$roundedNumber = round(4.6231231231);
$roundedNumber2 = round(4.6261231231, 2);
echo "<br>";
var_dump($roundedNumber);
echo "<br>";
var_dump($roundedNumber2);


// * định dạng hàng nghìn
echo "<br>";
echo 100000000;

echo "<br>";
echo number_format(1000000000, 0, '.', '.');

// * hàm thao tác với thời gian
date_default_timezone_set("Asia/Ho_Chi_Minh");
echo "<br>";
echo date("d-m-Y H:i:s");

// * lấy thời gian tính bằng giây: lấy từ mốc 01-01-1970
echo "<br>";
echo time();

// * lấy thời gian tính bằng giây của 1 ngày bất kỳ:
echo "<br>";
// ! "yyyy-mm-dd hh:mm:ss"
echo strtotime("1990-01-01 12:12:12");
