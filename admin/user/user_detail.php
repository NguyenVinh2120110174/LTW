<?php
$catId = $_GET['catId'];
$sql = "SELECT * FROM user WHERE id =   $catId";
$cat = $f->getOne($sql);


?>

<?php
$sqll = "SELECT * FROM user WHERE id =   $catId";
$result = $f->getAll($sqll);

?>

<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>User name</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
    </tr>
    <?php
    $i = 1;
    foreach ($result as $value) :
    ?>
        <tr>
            <td><?= $i ?> </td>
            <td><?= $value['username'] ?></td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['email'] ?></td>
            <td><?= $value['phone'] ?></td>
            <td><?= $value['address'] ?></td>
            <td><?= $value['gender'] ?></td>
            <td><?= $value['birth'] ?></td>

        </tr>
    <?php
        $i++;
    endforeach;
    ?>
</table>
<a href="<?= PATH_ADMIN ?>page=ql_user"> <button type="button" class="btn btn-info"> Quay lại</button></a>