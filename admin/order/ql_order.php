<?php
$sql = "SELECT * FROM order_detail";
$result = $f->getAll($sql);

?>

<table class="table table-bordered">
    <tr>
        <th>STT Đơn hàng</th>
        <th>Tên người đặt hàng</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Thời gian đặt hàng</th>
        <th>Xóa đơn hàng</th>
    </tr>
    <?php
    $i = 1;
    foreach ($result as $value) :
    ?>
        <tr>
            <td><?= $i ?> </td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['email'] ?></td>
            <td><?= $value['address'] ?></td>
            <td><?= $value['phone'] ?></td>
            <td><?= $value['order_date'] ?></td>
            <td><a href="<?= PATH_ADMIN ?>page=del_order&catId=<?= $value['id'] ?>"><img src=" asset/images/del.png"></a></td>

        <?php
        $i++;
    endforeach;
        ?>
</table>