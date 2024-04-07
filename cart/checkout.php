<link href="http://localhost:80/nguyenvinh/asset/css/style.css" rel="stylesheet">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_detail = array(

        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],

    );
    $f->addRecord("order_detail", $order_detail);
}
?>

<?php
unset($_SESSION['cart']);
unset($_SESSION['amount']);
unset($_SESSION['number_of_item']);


?>

<h1 style="color:Green; text-align: center;">Thanh toán thành công</h1>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="text-center">
    <i class="fa-solid fa-cart-flatbed fa-2xl" style="color: #005af5; font-size:20em"></i>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="text-center">
    <a href=" <?= PATH ?>page=index ?>" class="btn border">
        <i class="fa-solid fa-backward fa-beat" style="color: #0058f0;"></i>
        <span style="width:400px;" class=" badge text-black">
            <h3>Quay lại trang chủ</h3>
        </span>
    </a>
</div>