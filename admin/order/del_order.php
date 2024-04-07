<?php
$catId = $_GET['catId'];
$sql = "SELECT * FROM order_detail WHERE phone = $catId";
$cat = $f->getAll($sql);

    $f->delRecord("order_detail", $catId);
    header("Location: ".PATH_ADMIN."page=del_order");
    exit();
?>
