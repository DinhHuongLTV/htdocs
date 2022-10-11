<!-- //! xử lý form -->
<!-- // ! form có 2 dạng input: -->
<!-- // * cơ bản: giá trị nhìn thấy được text, number, radio, checkbox,... -->
<!-- // * dạng file: giá trị không đọc được -->

<?php
// ! 2 điều kiện bắt buộc để form bắt được thông tin của file:
// * method form = post
// * form phải có thêm thuộc tính sau:
// ? enctype = "multipart/form-data"
// ? php dùng biến mảng 2 chiều $_FILES lưu toàn bộ thông tin file gửi lên
// TODO 1: debug
echo "<pre>";
print_r($_POST);
// echo $_POST["avatar"];
print_r($_FILES);
echo "</pre>";

// TODO 2: tạo biến chứa lỗi và kqua
$error = "";
$result = "";

$extension = "";
$filename = "";

// TODO 3: xử lý form khi form được submit:
if (isset($_POST["submit"])) {
    // TODO 4: lấy giá trị từ form
    $avatar = $_FILES["avatar"]; // => dễ thao tác hơn
    // TODO 5: validate
    // * validate: follow these logics:
    // ? kiểu file là ảnh
    // ? required condition when processing file is file must be uploaded succesfully (hint: $avatar["error"])
    if ($avatar["error"] == 0) {
        // * file upload là ảnh: lấy đuôi file từ tên file
        $extension = pathinfo($avatar["name"], PATHINFO_EXTENSION);
        // * tạo mảng chứa các đuôi file ảnh:
        $allFileExtentions = ["jpg", "png", "jpeg", "gif"];
        if (!in_array($extension, $allFileExtentions)) {
            $error = "File uploaded must be in image format";
        }
    }
    // ? maximum capacity: 2MB
    $size_b = $avatar["size"];
    $size_mb = $size_b / 1024 / 1024;
    if ($size_mb > 2) {
        $error = "Your file is too large";
    }

    // TODO 6: logic processing: file must be uploaded without any errors
    if (empty($error)) { // nếu không có lỗi mới xử lý
        if ($avatar["error"] == 0) {
            // create a ralative path to save the file by command lines: mkdir - tạo ngay 1 thư mục ở cùng cấp với file code hiện tại
            $dir_upload = "upload";
            // always check the path mustn't exist to against overriding: file_exsits()
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // create file name which is the only: against overriding 
            $filename = time() . $avatar["name"];
            // upload file from temporary path to uploads file
            $is_moved = move_uploaded_file($avatar["tmp_name"], "$dir_upload/$filename");

            var_dump($is_moved);
            if ($is_moved) {
                $result .= "Ten file $filename </br>";
                $result .= "Capacity: $size_mb MB </br>";
                $result .= "Avatar: <img src='./$dir_upload/$filename' width='100px'>";
            }
        }
    }
}

// ! xử lý form
// * các thuộc tính của $FILES:
// ? name: tên file
// ? full_path: tên file:
// ? tmp_name: temporary, là đường dẫn tạm thời lưu file tải lên, được gán giá trị ngay khi chọn file xong
// ? error: mã lỗi, nếu error = 0 là không có lỗi, file được tải vào đường tạm thành công, nếu không là có lỗi 
// ? size: dung lượng file (byte)
// ? 
?>

<h2><?php echo $extension; ?></h2>
<h2><?php echo $filename; ?></h2>
<h2><?php echo $error; ?></h2>
<h2><?php echo $result; ?></h2>


<form action="" method="post" enctype="multipart/form-data">
    <div class="input_field">
        <!-- //! value của input file sẽ không như các type khác, nó không dùng được, thêm từ khóa 'multiple' để chọn nhiều: -->
        <label for="">Chọn ảnh đại diện:</label>
        <input type="file" name="avatar">
    </div>
    <input type="submit" value="uploaded" name="submit">
</form>