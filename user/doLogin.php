<?php


$email = $_POST['email'];
$password = $_POST['pswd'];

$sql = "SELECT * FROM user WHERE  email = '" . $email . "' AND password = '" . sha1($password) . "' ";
$result =  $f->getOne($sql);

if (!is_null($result)) {
    $_SESSION['user'] = $result['username'];
    $_SESSION['userId'] = $result['id'];
    header("Location:index.php");
} else {
    header("Location:http://localhost/nguyenvinh/user/err404.php");

    echo "<button type='submit'>Login</button>";
}
// return $result;
