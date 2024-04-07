
<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // chứa danh sách các id sản phẩm trong giỏ hàng
    $_SESSION['amount'] = array(); // chứa số lượng từng  id sản phẩm
    $_SESSION['number_of_item'] = 0;  // chứa số lượng item trong giỏ hàng
}
$id = $_GET['id'];

$k = array_search($id, $_SESSION['cart']);
if ($k === false) {
    array_push($_SESSION['cart'], $id);
    array_push($_SESSION['amount'], 1);
    $_SESSION['number_of_item']++;
}
else{
    $_SESSION['amount'][$k]++;
}

 header("Location: index.php");
?>