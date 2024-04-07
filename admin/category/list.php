<?php
$sql = "SELECT * FROM category";
$result = $f->getAll($sql);

?>
<div>
    <a href="<?= PATH_ADMIN ?>page=addCat"> <button type="button" class="btn btn-info"> Thêm danh mục </button></a>
</div>
<br>
<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php
    $i = 1;
    foreach ($result as $value) :
    ?>
        <tr>
            <td><?= $i ?> </td>
            <td><?= $value['category_name'] ?></td>
            <td><a href="<?= PATH_ADMIN ?>page=editCat&catId=<?= $value['id'] ?>"> <img src="asset/images/edit.png"></a></td>
            <td><a href="<?= PATH_ADMIN ?>page=delCat&catId=<?= $value['id'] ?>"><img src=" asset/images/del.png"></a></td>
        </tr>
    <?php
        $i++;
    endforeach;
    ?>
</table>