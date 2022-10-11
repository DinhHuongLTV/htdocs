<?php

// ! form tag's attributes
// * action: directory takes data sumited from your form, with empty value it 
// * method: there 2 validvalues (POST and GET)
// * POST: url được giữ nguyên vì dữ liệu được truyền ngầm, bảo mật hơn GET
// * GET: url thêm chuỗi `${name} = ${value}`, thuận tiện tìm kiếm, $_GET

// ! input's name attribute
// * bắt buộc phải khai báo vì php dựa vào name để nhận biết dữ liệu là của input nào gửi lên

// ! quy trình xử lý form
// * step 1: debugging, based on form's method's values to debug
echo "<pre>";
print_r($_POST);
echo "</pre>";

// * step 2: declare error and result variables:
$error = "";
$result = "";

// * step 3: check if user submit form yet then handle form
if (isset($_POST["submitter"])) {

    // * step 4: take values from your form
    $username = $_POST['yourname'];

    // * step 5: Validate form: if error appears, $error will take alerted string
    // * logic used: name must be entered at least 3 charactor: ( hint: use empty() )
    if (empty($username)) {
        $error = "Must be entered";
    } else if (strlen($username) < 3) {
        $error = "Name has at least 3 charactor";
    }
    // * step 6: Main logic handling when no error appears
    if (empty($error)) {
        $result = "Your name: $username";
    }
}


// * step 7: show $error and $result to 

// * step 8: show data to form when something suddenly happens
?>
// * step 7
<h3 style="color: red;"><?php echo $error; ?></h3>
<h3 style="color: green;"><?php echo $result; ?></h3>
<!-- demo form html -->
<form action="" method="POST">
    <!-- // TODO : đổ dữ liệu ra form -->
    <input type="text" name="yourname" placeholder="Enter your name here" value="<?php $_POST['yourname'] ? $_POST['yourname'] : '' ?>">
    <br>
    <input type="submit" value="Show name" name="submitter">
</form>