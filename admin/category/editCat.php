<?php
$catId = $_GET['catId'];
$sql = "SELECT * FROM category WHERE id =   $catId";
$cat = $f->getOne($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catname'];
    $cat = [
        'category_name' => $catName
    ];
    $message = $f->checkExist("category", "category_name", $catName);
    if ($message != 1) {
        $f->message($message);
    } else {
        $f->editRecord("category",$catId, $cat);
        header("Location:" . PATH_ADMIN . "page=catList");
        exit();
    }
}
?>

<div>
    <form method="post" action="<?= PATH_ADMIN ?>page=editCat&catId=<?= $catId?>">
        <div class="form-group">
            <label for="name"><b>Sửa tên danh mục: </b></label>
            <input type="text" class="form-control" name="catname" value="<?= $cat['category_name'] ?>" required>
        </div>
        <input type="submit" class="btn btn-info"> </input>
    </form>

</div>