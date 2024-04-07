<?php
session_start();
ob_start();
require("../lib/coreFunction.php");
$f = new ConeFunction();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    $sql = "SELECT * FROM user WHERE  email = '". $email."' AND password = '" . sha1($password)."' AND role = 'admin' ";

    $result =  $f->getOne($sql);

    if (!is_null($result)) {
        $_SESSION['admin'] = $result['username'];
        header("Location:index.php");
    }
    else{
        header("Location:Alogin.php");
    }

}
    