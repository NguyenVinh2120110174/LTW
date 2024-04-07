<?php
$sql = "SELECT * FROM user";
$result = $f->getAll($sql);

?>

<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Tên người dùng</th>
        <th>Xem chi tiết</th>

    </tr>
    <?php
    $i = 1;
    foreach ($result as $value) :
    ?>
        <tr>
            <td><?= $i ?> </td>
            <td><?= $value['username'] ?></td>
            <td><a href="<?= PATH_ADMIN ?>page=user_detail&catId=<?= $value['id'] ?>"> <img src="asset/images/edit.png"></a></td>

        <?php
        $i++;
    endforeach;
        ?>
</table>