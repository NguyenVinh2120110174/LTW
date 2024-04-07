<?php
require('lib/file.php');
$userId  = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image = $_FILES['image'];
    $pass = $_POST['pswd'];


    $a = array(
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'gender' => $_POST['gender'],
        'username' => $_POST['username'],
        'birth' => $_POST['birth'],
    );


    if ($image['size'] != 0) {
        $a['avatar'] = $image['name'];
        $u = new Upload;
        $u->doUpload($image);
    }
    if ($pass != "") {
        $a['password'] = sha1($pass);
    }
    $f->editRecord("user", $userId, $a);
}
$sql = "SELECT * FROM  user  WHERE id = $userId";
$result = $f->getOne($sql);
?>

<div class="well">
    <div class="row-px-5">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item active"><a class="btn text-dark " href=""> Cập nhập tài khoản </a></li>
                <li class="list-group-item"><a class="btn text-dark" href="<?= PATH ?>page=user_detail"> Quản lý đơn hàng </a></li>
                <li class="list-group-item"><a class="btn text-dark" href=""> Blog </a></li>
            </ul>
        </div>
    </div>
    <div class="well1">
        <h2>ĐĂNG KÍ THÀNH VIÊN</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?page=account&id=<?= $userId ?>" method="post" enctype="multipart/form-data" border: 3px solid>
            <div class="container">
                <label for="name" class="form-label"><b>Họ Tên</b></label>
                <div>
                    <input type="text" class="form-control" id="username" placeholder=" Họ tên" name="name" value="<?= $result['name'] ?>" />

                </div>
            </div>

            <div class="container">


                <label for="gender" class="form-label"><b>Giới tính</b></label></br>
                Nam:    <input type="radio" class="form-check-input" name="gender" value=1 <?php if ($result['gender'] == 1) echo "checked"; ?>>
                    Nữ: <input type="radio" class="form-check-input" name="gender" value=0 <?php if ($result['gender'] == 0) echo "checked"; ?>>



            </div>

            <div class="container">
                <label class="control-label"><b>Ngày Sinh</b></label>
                <div>
                    <input class="form-control" type="date" name="birth" required="" value="<?= $result['birth'] ?>">

                </div>
            </div>

            <div class="container">
                <label for="phone" class="form-label"><b>Điện thoại</b></label>
                <div>
                    <input type="number" class="form-control" id="lop" placeholder="" name="phone" value="<?= $result['phone'] ?>">


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
                    <input type="email" class="form-control" id="email" placeholder="" name="email" value="<?= $result['email'] ?>">


                </div>
            </div>


            <div class="container">
                <label for="address" class="form-label"><b>Địa chỉ</b></label>
                <div>
                    <input type="text" class="form-control" id="lop" placeholder="" name="address" value="<?= $result['address'] ?>">

                </div>
            </div>

            <div class="container">
                <label for="name" class="form-label"><b>Tên đăng nhập</b></label>
                <div>
                    <input type="text" class="form-control" id="lop" placeholder="" name="username" value="<?= $result['username'] ?>">


                </div>
            </div>

            <div class="container">
                <label for="password" class="form-label"><b>Mật khẩu</b></label>
                <div>
                    <input type="password" class="form-control" id="lop" placeholder="" name="pswd">


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

    .well1 {
        border: 5px solid #e3e3e3;
        display: inline-block;
        width: 100%;

    }
</style>