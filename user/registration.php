<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $addressErr = $phoneErr = $usernameErr = $passErr = $birthErr = "";
$name = $email = $gender = $address = $phone = $username = $pass = $birth = "";
$flag = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            $flag = 1;
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                $flag = 0;
            }
        }

        //gender
        if ($_POST["gender"] == "") {
            $genderErr = "Gender is required";
            $flag = 0;
        } else {
            $gender = test_input($_POST["gender"]);
            $flag = 1;
        }

        ///email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $flag = 0;
        } else {
            $email = test_input($_POST["email"]);
            $flag = 1;
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $flag = 0;
            }
        }

        //birth
        if (empty($_POST["birth"])) {

            $birthErr = "BIRTH is required";
            $flag = 0;
        } else {
            $birth = test_input($_POST["birth"]);
            $flag = 1;
        }

        //phone
        if (empty($_POST["phone"])) {

            $phoneErr = "PHONE is required";
            $flag = 0;
        } else {
            $phone = test_input($_POST["phone"]);
            $flag = 1;
            $phone_pattern = "/^\d+$/";
            if (!preg_match($phone_pattern, $phone)) {
                $phoneErr = "Only number are allowed";
                $flag = 0;
            }
        }

        //address
        if (empty($_POST["address"])) {

            $addressErr = "ADDRESS is required";
            $flag = 0;
        } else {
            $address = test_input($_POST["address"]);
            $flag = 1;
        }

        //username
        if (empty($_POST["username"])) {

            $usernameErr = "username is required";
            $flag = 0;
        } else {
            $username = test_input($_POST["username"]);
            $flag = 1;
        }

        //pass
        if (empty($_POST["password"])) {

            $passErr = "Pass is required";
            $flag = 0;
        } else {
            $pass = sha1(test_input($_POST["password"]));
            $flag = 1;
        }
        if ($flag == 1) {
            $i = "temp.png";
            if ($_FILES['image']['size'] == 0) {
                echo $_FILES['image']['error'];
            } else {
                require("lib/file.php");
                $file = $_FILES['image'];
                $i = $file['name'];
                $u = new Upload();
                $u->doUpload($file);
            }
            $user = array(
                'username' => $_POST['username'],
                'password' => sha1($_POST['password']),
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'gender' => $_POST['gender'],
                'avatar' => $i,
                'birth' => $_POST['birth'],
            );
            $f->addRecord("user", $user);
            // header('Location: index.php');
        }
    }
}

?>


<div class="well">

    <h2> ĐĂNG KÍ THÀNH VIÊN </h2>
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?page=registration" method="post" enctype="multipart/form-data" border: 3px solid>
        <div class="container">
            <label for="name" class="form-label"><b>Họ Tên</b></label>
            <div>
                <input type="text" class="form-control" id="username" placeholder=" Họ tên" name="name" value="<?= $name ?>" />
                <span class="error"><?= $nameErr ?> </span>
            </div>
        </div>

        <div class="container">
            <?php
            if (isset($gender)  && $gender == 1) {
                echo "<label for='gender' class='form-label'><b>Giới tính</b></label></br>
                Nam:    <input type='radio' class='form-check-input' name='gender' value='1' />
                Nữ: <input type='radio' class='form-check-input' name='gender' value='0' />";
            } else {
                echo
                "<label for='gender' class='form-label'><b>Giới tính</b></label></br>
                Nam:  <input type='radio' class='form-check-input' name='gender' value='1' />
                    Nữ   <input type='radio' class='form-check-input' name='gender' value='0'  />";
            }

            ?>
            <span class="error"><?= $genderErr ?> </span>

        </div>

        <div class="container">
            <label class="control-label"><b>Ngày Sinh</b></label>
            <div>
                <input class="form-control" type="date" name="birth" required="" value="<?= $birth ?>">
                <span class="error"><?= $birthErr ?> </span>
            </div>
        </div>

        <div class=" container">
            <label for="phone" class="form-label"><b>Điện thoại</b></label>
            <div>
                <input type="number" class="form-control" id="lop" placeholder="" value="<?= $phone ?>" name="phone">
                <span class="error"><?= $phoneErr ?> </span>

            </div>
        </div>

        <div class="container">
            <label for="avatar" class="form-label"><b>Hình ảnh</b></label>
            <div>
                <input type="file" class="form-control" placeholder="Địa chỉ" name="image">
            </div>
        </div>

        <div class="container">
            <label for="email" class="form-label"><b>Email</b></label>
            <div>
                <input type="email" class="form-control" id="email" placeholder="" name="email" value="<?= $email ?>">
                <span class="error"><?= $emailErr ?> </span>

            </div>
        </div>


        <div class="container">
            <label for="address" class="form-label"><b>Địa chỉ</b></label>
            <div>
                <input type="text" class="form-control" id="lop" placeholder="" name="address" value="<?= $address ?>">
                <span class="error"><?= $addressErr ?> </span>
            </div>
        </div>

        <div class="container">
            <label for="name" class="form-label"><b>Tên đăng nhập</b></label>
            <div>
                <input type="text" class="form-control" id="lop" placeholder="" name="username" value="<?= $username ?>">
                <span class="error"><?= $usernameErr ?> </span>

            </div>
        </div>

        <div class="container">
            <label for="password" class="form-label"><b>Mật khẩu</b></label>
            <div>
                <input type="password" class="form-control" id="lop" placeholder="" name="password" value="<?= $pass ?>">
                <span class="error"><?= $passErr ?> </span>

            </div>
        </div>
        <div> <br> </div>
        <div class="container">
            <div class="controls">
                <input style="background-color:#04AA6D;
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
                color:#f5f5f5;
                border-radius: 5px;" type="submit" name="submitAccount" value="Lấy thông tin " class="shopBtn exclusive">
            </div>
        </div>
    </form>
</div>

<style>
    h2 {
        text-align: center;
        color: green;
    }

    input[type=text],
    input[type=password],
    input[type=number],
    input[type=email],
    input[type=date],
    input[type=file] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
</style>