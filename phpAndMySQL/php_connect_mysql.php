<?php
// cách php kết nối với csdl mySQL thông qua thư viện bên thứ 3: 
// * mysqli: sử dụng hàm php thuần để kết nối, chỉ kết nối được với mysql
// * pdo: chỉ sử dụng cú pháp của OOP, ưu tiên trong thực tế, hỗ trợ kết nối nhiều csdl khác nhau

// ? các bước kết nối từ PHP tới MySQL
// TODO 1: initialize connection
// * 1.khai báo các hằng số lưu thông tin kết nối:
// * a. tên máy chủ đang lưu trữ csdl kết nối:
const DB_HOST = "localhost";
// * b. Username login to Database:
const DB_USERNAME = "root"; // mặc định sinh ra bởi xampp
// * c.Password login to database:
const DB_PASSWORD = ""; // mặc định là chuỗi rỗng sinh ra bởi xampp
// * d.Tên cơ sở dữ liệu sẽ kết nối:
const DB_NAME = "php2207edemo";
// * e.Cổng của csdl:
const DB_PORT = 3306;

// Code kết nối
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

?>
<h2><?php echo "Connect successfully"; ?></h2>
<?php
// !: INSERT: thêm dữ liệu tĩnh vào categories(id, name)
// * b1: Viết truy vấn INSERT
$sql_insert = "INSERT INTO categories(name) values ('Thể thao')";

// * b2: thực thi truy vấn: INSERT trả về boolean
$is_inserted = mysqli_query($connection, $sql_insert);
var_dump($is_inserted);
// * b3: Debug khi thực thi bị false: copy câu truy vấn và chạy trực tiếp trên tab sql của Workbench hoặc PHPMyAdmin để sửa

// !c/ UPDATE: cập nhật dữ liệu
// todo: cập nhật tên sản phẩm = abc, giá sp = 123 với sản phẩm có id = 3
// *b1: Viết truy vấn
$sql_update = "UPDATE products SET name = 'abc', price = 123 WHERE id = 3";
// *b2: thực thi truy vấn
$is_updated = mysqli_query($connection, $sql_update);
var_dump($is_updated);

// !d/ DELETE: 
// todo: xóa mục id > 2;
// *b1: viết truy vấn
$sql_delete = "DELETE from categories where id > 2";
// *b2: thực thi truy vấn
$is_deleted = mysqli_query($connection, $sql_delete);
var_dump($is_deleted);

// !e/ SELECT: không trả về boolean mà trả về đối tượng trung gian
// ? select 1 bản ghi: lấy sp có id = 4
// *b1: viết truy vấn
$sql_one = "SELECT * from products where id = 4";
// *b2: thực thi
$resultOne = mysqli_query($connection, $sql_one);
var_dump($resultOne); // trả về mảng 1 chiều khó hiểu
// *b3: lấy ra thông tin dưới dạng mảng kết hợp 1 chiều từ obj trung gian
$product = mysqli_fetch_assoc($resultOne);
echo "<pre>";
print_r($product);
echo "</pre>";

// ? select nhiều bản ghi: lấy tất cả sp
// *b1: viết truy vấn
$sql_selectAll = "SELECT * from categories";
// *b2: thực thi
$resultAll = mysqli_query($connection, $sql_selectAll);
echo "</br>";
var_dump($resultAll);
// *b3: lấy ra thông tin dưới dạng mảng kết hợp 2 chiều 
$productAll = mysqli_fetch_all($resultAll, MYSQLI_ASSOC);
echo "<pre>";
print_r($productAll);
echo "</pre>";

foreach ($productAll as $product) {
    echo "</br>" . $product["name"];
}
?>