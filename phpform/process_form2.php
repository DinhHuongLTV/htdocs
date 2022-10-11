<style>
    label+input {
        margin-bottom: 16px;
    }
</style>
<form action="" method="GET">
    <label for="userEmail">Email: </label>
    <input type="text" name="userEmail" id="userEmail">
    <br>
    <label for="userAge">Age: </label>
    <input type="text" name="userAge" id="userAge">
    <br>
    <input type="radio" name="userGender" id="userGender--male" value="male">
    <label for="userGender--male">Male</label>
    <input type="radio" name="userGender" id="userGender--female" value="female">
    <label for="userGender--female">Female</label>
    <input type="radio" name="userGender" id="userGender--other" value="other">
    <label for="userGender--other">Others</label>
    <br>

    <input type="checkbox" name="userJob[]" id="PM" value="Project Manager">
    <label for="PM">Project Manager</label>
    <input type="checkbox" name="userJob[]" id="T" value="Tester">
    <label for="T">Tester</label>
    <input type="checkbox" name="userJob[]" id="D" value="Developer">
    <label for="D">Developer</label>

    <br>
    <label for="nationality">Nationality</label>
    <select name="nationality" id="nationality">
        <option value="vietnamese">Vietnamese</option>
        <option value="korean">Korean</option>
        <option value="japanese">Japanese</option>
        <option value="american">American</option>
    </select>
    <br>
    <label for="note"></label>
    <textarea name="note" id="note" cols="30" rows="5"></textarea>
    <br>
    <input type="submit" value="Submit" name="submit">
</form>

<?php
// * step 1: debugging
echo "<pre>";
print_r($_GET);
echo "</pre>";

// * step 2: declaring
$error = "";
$result = "";

// * step 3: checking 
if ($_GET['submit']) {
    // * step 4: taking output
    $email = $_GET['userEmail'];
    // ? it will alert whether you dont tick
    // ! attention to these two input
    // $gender = $_GET['userGender'];
    // $job = $_GET['userJob'];
    $age = $_GET['userAge'];
    $nationality = $_GET['nationality'];
    $note = $_GET['note'];

    // * step 5: validating, follow these logics below:
    // * $email must be in correct form
    // * $age must be number
    // * $gender and $job are required
    // * filter_var(): kiểm tra biến có đúng định dạng
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "<br>Email must be in correct form";
    }
    if (!is_numeric($age)) {
        $error .= "<br>Age must be number";
    }
    if (!isset($_GET['userGender'])) {
        $error .= "<br>Gender are required";
    }
    if (!isset($_GET['userJob'])) {
        $error .= "<br>Must be choose at least one job";
    }
    if (empty($error)) {
        $result = "Email: $email<br>";
        $result .= "Age: $age<br>";
        $gender = $_GET['userGender'];
        $result .= "Gender: $gender<br>";
        $jobs = $_GET['userJob'];
        $job_text = "";
        foreach ($jobs as $job) {
            $job_text .= "$job ";
        }
        $result .= "Job(s): $job_text <br>";
        $result .= "Nationality: $nationality<br>";
        $result .= "Note: $note<br>";
    }
}

?>
// * step 7:
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>