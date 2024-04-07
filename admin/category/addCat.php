<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catname'];
    $cat = [
        'category_name' => $catName
    ];
    $message = $f->checkExist("category", "category_name", $catName);
    if ($message != 1) {
        $f->message($message);
    } else {
        $f->addRecord("category", $cat);
        header("Location:" . PATH_ADMIN . "page=catList");
        exit();
    }
}
?>

<div>
    <form method="post" action="<?= PATH_ADMIN ?>page=addCat">
        <div class="form-group">
            <label for="name"><b>Tên danh mục: </b></label>
            <input type="text" class="form-control" placeholder=" Danh mục" name="catname" required>
        </div>
        <input type="submit" class="btn btn-info"> </input>
    </form>

</div>