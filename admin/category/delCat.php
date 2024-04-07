<?php
$catId = $_GET['catId'];

$sql = "SELECT * FROM product WHERE cat_id = $catId";
$cat = $f->getAll($sql);
if (count($cat) > 0) {
    echo "<script>";
    echo "if (confirm('Danh mục đã có sản phẩm, không được xóa')){";
    echo "window.location.href='http://localhost/nguyenvinh/admin/index.php?page=catList'";
    echo "} else{";
    echo "window.location.href='';";
    echo "}";
    echo "</script>";
    exit();
} else {
    $f->delRecord("category", $catId);
    header("Location: " . PATH_ADMIN . "page=catList");
    exit();
}
